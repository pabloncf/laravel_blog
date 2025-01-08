<x-app-layout>
    <div class="container profile-page">
        <div class="row">
            <div class="col-md-4">
                <div class="card profile-card text-center shadow-sm">
                    <div class="card-body">
                        <img src="{{ asset($user->profile_picture ?? 'img/default-profile.png') }}" alt="Foto de Perfil"
                            class="img-fluid">
                        <h4 class="card-title">{{ $user->name }}</h4>
                        <p class="username">{{ '@' . $user->username }}</p>
                        <p class="bio">{{ $user->bio }}</p>

                        @if (Auth::id() === $user->id)
                            <a href="{{ route('profile.edit') }}" class="btn mt-3 edit-profile-button">
                                Editar Perfil
                            </a>
                        @endif
                    </div>
                </div>

                <div class="card friends-card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Amigos</h5>
                    </div>
                    <div class="card-body">
                        @if (empty($friends))
                            <p class="text-muted">Ainda não há amigos adicionados.</p>
                        @else
                            <ul>
                                @foreach ($friends as $friend)
                                    <li>
                                        <img src="{{ asset($friend->profile_picture ?? 'img/default-profile.png') }}"
                                            alt="Foto de {{ $friend->name }}">
                                        <a href="{{ route('profile.show', $friend->id) }}">
                                            {{ $friend->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card posts-card">
                    <div class="card-header">
                        <h5 class="mb-0">Publicações</h5>
                    </div>
                    <div class="card-body">
                        @if (empty($posts))
                            <p class="text-muted">Nenhuma publicação encontrada.</p>
                        @else
                            @foreach ($posts as $post)
                                <div class="card">
                                    <div class="card-body">
                                        <h6>{{ $post->created_at->format('d/m/Y H:i') }}</h6>
                                        <p>{{ $post->content }}</p>
                                        @if ($post->image)
                                            <img src="{{ asset($post->image) }}" alt="Imagem da Publicação">
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
