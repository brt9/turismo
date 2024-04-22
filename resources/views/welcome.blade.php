<body>
    @include('includes.navbar')
    <style>
        /* Estilos para o degradê transparente */
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(243, 243, 243, 0.6), rgba(0, 0, 0, 0.8));
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .bg-overlay.hidden {
            opacity: 0;
        }

        /* Estilos para o conteúdo sobre o vídeo */
        .header-content {
            position: relative;
            z-index: 1;
        }
        .image-container {
    max-width: 100%;
    position: center; /* Para posicionamento relativo */
}

.image-container-lg {
    display: none; /* Esconde a imagem por padrão */
}

.image-container img {
    width: 900px; /* Largura padrão */
    height: 325px; /* Altura padrão */
    max-width: 100%;

}



@media (max-width: 768px) {
    .image-container {
        padding-top: 25px; /* Novo valor de padding-top */
        padding-bottom: 25px; /* Novo valor de padding-bottom */
        
    }

    .image-container-lg {
        display: none; /* Oculta a imagem em telas pequenas */
    }

    #main-title {
        top: 100px; /* Ajusta o posicionamento do h1 em telas menores */
        width: auto; /* Largura automática para ocupar a largura disponível */
        left: 0;
        right: 0;
        text-align: center;
    }
}

@media (min-width: 769px) {
    .image-container-lg {
        display: block; /* Mostra a imagem em telas maiores */
    }

    #main-title {
        display: none; /* Oculta o h1 em telas maiores */
    }
}


    </style>
    </head>

    <body>
        <div class="content" style="z-index: 1; position: relative;">
            <header class="bg-dark" style="padding-top: 150px; padding-bottom: 360px; position: relative;">
                <video autoplay muted loop preload="auto">
                    <source src="assets/buggy.mp4" type="video/mp4">
                    <!-- Adicione mais formatos de vídeo, se necessário -->
                    Seu navegador não suporta a reprodução de vídeo.
                </video>
                <!-- Overlay para degradê transparente -->
                <div class="bg-overlay"></div>

                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white header-content">
                        <div class="image-container">
                            <div class="image-container-lg">
                                <img src="images/logo.png" href="#page-top" alt="" srcset="" style="width: 900px; height: 325px;">
                            </div>
                            
                            <h1 class="display-4 fw-bolder" id="main-title">
                                <span style="color: #ff2800; font-size: 60px;">Hot </span>
                                <span style="color: #000;font-size: 60px;" >Buggy </span><br>
                            </h1>
                        </div>
                        <h1 class="lead fw-normal mb-0" style="font-size: 35px;">Sinta o calor do Nordeste em cada
                            passeio</h1>
                    </div>
                </div>

            </header>
        </div>

        <script>
            // Espera que o documento esteja completamente carregado
            document.addEventListener("DOMContentLoaded", function() {
                // Seleciona o elemento do gradiente
                const overlay = document.querySelector('.bg-overlay');

                // Após 9 segundos, adiciona a classe 'hidden' para esconder o gradiente
                setTimeout(function() {
                    overlay.classList.add('hidden');
                }, 9000); // 9 segundos
            });
        </script>


        <!-- Section-->
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Desvendando Terras Novas</h2>
                        <p>Em cada curva, um mistério; em cada passo, uma descoberta. Junte-se a nós e embarque nessa
                            jornada.</p>
                    </div>
                </div>
            </div>
            <style>
                .custom-card {
                    height: 100%;
                }

                .custom-card .card-img-top {
                    object-fit: cover;
                    height: 350px;
                    /* Aumentando a altura da imagem */
                }

                .custom-card .card-body {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }

                .custom-card .price {
                    margin-top: auto;
                    /* Faz com que o preço fique na parte inferior */
                }

                .center-vertical {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    height: 100%;
                }
            </style>

            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($passeios as $passeio)
                        <div class="col ftco-animate">
                            <div class="card mb-4 custom-card">
                                <a href="/passeios?id={{ $passeio->id }}" class="img-prod">
                                    <img class="card-img-top" src="{{ $passeio->imagem }}" alt="{{ $passeio->nome }}">
                                    <div class="overlay"></div>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center" style="font-size: 20px;"><a
                                            href="/passeios?id={{ $passeio->id }}">{{ $passeio->nome }}</a></h5>
                                    <div class="card-text center-vertical">
                                        <div class="price text-center">
                                            <span class="text-decoration-line-through" style="font-size: 20px;"> R$
                                                {{ number_format($passeio->preco_anterior, 2) }}</span>
                                        </div>
                                        <div class="price text-center">
                                            <span class="text-success" style="font-size: 30px;"> R$
                                                {{ number_format($passeio->preco, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a class="btn btn-primary" href="/passeios?id={{ $passeio->id }}">Saiba
                                            Mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



        </section>




        @include('includes.instagram')

        @include('includes.footer')
    </body>

    </html>
