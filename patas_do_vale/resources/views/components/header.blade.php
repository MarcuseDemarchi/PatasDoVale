    <header>
        <h1 style="color: white">Projeto Patas do Vale</h1>
        <div class="head_right">
            @auth
                <div class="menu_profile">
                    <div class="user_picture">{{ substr(auth()->user()->name,0,1) }}</div>

                    <nav>
                        <div class="user_infos">
                            <span>{{auth()->user()->name}}</span>
                        </div>
                        <ul>
                            <li>
                                <a href="/logout">Sair</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endauth

            @guest
                <x-button class='' routePage='login'>Login</x-button> 
                <x-button class='btn_login' routePage='create_account'>Cria sua conta</x-button>            
                {{-- melhor chamar desta maneira --}}
            @endguest                
        </div>
    </header> 