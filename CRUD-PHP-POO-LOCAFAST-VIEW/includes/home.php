<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="includes/styles.css">
    <title>Home</title>
</head>

<body style="background-color: #F7FAEF">


    <div style="width: 100%; margin-top:1%; display: flex; justify-content:center; align-items:center; border-radius:10px">



        <nav style="display:flex; width:85%; background-color: #165F2B; align-items:center;border-radius:10px ">
            <img src="images/Logo.png" alt="" style="width: 8%;">
            <ul class="navbar-nav" style="display: flex; flex-direction: row; justify-content:space-around; width: 90%;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="" style="color:white">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#carros" style="color:white">Nossos Carros</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#nos" style="color:white">Sobre Nós</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#marcas" style="color:white">Marcas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#avaliacoes" style="color:white">Avaliações</a>
                </li>

                <li class="nav-item">
                    <div style="display:flex; align-items:center ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                        </svg>
                        <a class="nav-link" href="login.php?status" style="color:white">Login</a>
                    </div>
                </li>

            </ul>
        </nav>
    </div>

    <section class="banners" style="margin-top: 2%; width: 100%; display:flex; justify-content:center">

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="width:85%">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/Blue and White Modern Rent a Car Banner Landscape 1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/Blue White Modern Car Service Banner (1) 1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/Blue White Modern Car Service Banner 1.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>

    <section class="benefits" style="background-color: #F2F2F2; display:flex; justify-content:center; align-items:center; margin-top:2%">

        <div style="width: 100%; display:flex; justify-content:center; padding:1%; ">

            <div style="display: flex; gap:2%; margin-right:2%">
                <div style="width: 30%;">
                    <img src="images/phone-section.png" alt="" style="width: 100%;">
                </div>
                <div style="display:flex; flex-direction: column">
                    <p><strong>Fast Retirada Digital</strong> <br>Retire seu carro em até 5 <br>minutos, sem enfrentar filas.</p>
                </div>
            </div>

            <div style="display: flex; gap:2%; margin-right:2%">
                <div style="width: 30%;">
                    <img src="images/Car-Section.png" alt="" style="width: 100%;">
                </div>
                <div style="display:flex; flex-direction: column">
                    <p><strong>Adicionais</strong> <br>Pra que sua viagem seja ainda mais <br> simples e prazerosa!</p>
                </div>
            </div>

            <div style="display: flex; gap:2%">
                <div style="width: 30%;">
                    <img src="images/User-section.png" alt="" style="width: 100%;">
                </div>
                <div style="display:flex; flex-direction: column">
                    <p><strong>Portal do Cliente </strong> <br>Tudo que você precisa, em um só lugar.</p>
                </div>
            </div>

        </div>

    </section>

    <section style="display: flex; justify-content:center; flex-direction: column; align-items:center; margin-top:3%; width: 100%" id="carros" ;>

        <div style="display:flex; width:80%; flex-direction: column; justify-content:center; align-items:center">
            <h3 style="color: #165F2B">Conheça Nossos Carros</h3>
            <p>As melhores condições para você reservar e aproveitar</p>
            <div style="display: flex; justify-content: center; width:90%; gap: 2%">
                <div style="background-color: #e2dfdfff; border-radius:10px">
                    <div>
                        <img src="images/fiat-uno.png" alt="" srcset="">
                    </div>
                    <div style="display:flex; justify-content:center;margin-bottom:3%">
                        <h4 style="color:#165F2B; ">Fiat Uno</h4>
                    </div>
                    <div style="display:flex; justify-content:center">
                        <a class="btnsolicita" href="" data-bs-toggle="modal" onclick="pegaCategoria('Hatch')" data-bs-target="#staticBackdrop">Solicitar</a>
                    </div>
                </div>
                <div style="background-color: #e2dfdfff; border-radius:10px">
                    <div>
                        <img src="images/fordka.png" alt="" srcset="">
                    </div>
                    <div style="display:flex; justify-content:center">
                        <h4 style="color:#165F2B;">Ford Ka</h4>
                    </div>
                    <div style="display:flex; justify-content:center">
                        <a class="btnsolicita" href="" data-bs-toggle="modal" onclick="pegaCategoria('Sedan')" data-bs-target="#staticBackdrop">Solicitar</a>
                    </div>
                </div>
                <div style="background-color: #e2dfdfff; border-radius:10px">
                    <div>
                        <img src="images/gol.png" alt="" srcset="">
                    </div>
                    <div style="display:flex; justify-content:center">
                        <h4 style="color:#165F2B;">Volkswagen Gol</h4>
                    </div>
                    <div style="display:flex; justify-content:center">
                        <a class="btnsolicita" href="" data-bs-toggle="modal" onclick="pegaCategoria('Hatch')" data-bs-target="#staticBackdrop">Solicitar</a>
                    </div>
                </div>
                <div style="background-color: #e2dfdfff; border-radius:10px">
                    <div>
                        <img src="images/onix.png" alt="" srcset="">
                    </div>
                    <div style="display:flex; justify-content:center">
                        <h4 style="color:#165F2B;">Chevrolet Onix</h4>
                    </div>
                    <div style="display:flex; justify-content:center">
                        <a class="btnsolicita" href="" data-bs-toggle="modal" onclick="pegaCategoria('Sedan')" data-bs-target="#staticBackdrop">Solicitar</a>
                    </div>
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulário Solicitação</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form class="formularioLocacao">
                                    <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:50%">
                                            <label for="exampleInputNome" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Nome</label>
                                            <input type="text" class="form-control" value="" name="nome_completo" id="nome_completo" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:30%; ">
                                            <input type="hidden" id="action" value="solicita">
                                            <label for="exampleInputCpf" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">CPF</label>
                                            <input type="text" class="form-control" value="" name="cpf" id="cpf" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                    </div>

                                    <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:50%">
                                            <label for="exampleInputEmail" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Email</label>
                                            <input type="text" class="form-control" value="" name="email" id="email" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                    </div>


                                    <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%">
                                            <label for="exampleInputData_nascimento" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Data Nascimento</label>
                                            <input type="date" class="form-control" value="" name="data_nascimento" id="data_nascimento" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:60%">
                                            <label for="exampleInputEndereco" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Endereço</label>
                                            <input type="text" class="form-control" value="" name="endereco" id="endereco" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                    </div>
                                    <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:60%">
                                            <label for="exampleInputTelefone" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Telefone</label>
                                            <input type="text" class="form-control" value="" name="telefone" id="telefone" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                    </div>
                                    <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%">
                                            <label for="exampleInputData_retirada" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Data Retirada</label>
                                            <input type="date" class="form-control" value="" name="data_retirada" id="data_retirada" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%">
                                            <label for="exampleInputData_devolucao" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Data Devolução</label>
                                            <input type="date" class="form-control" value="" name="data_devolucao" id="data_devolucao" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: flex; flex-direction:row; margin-top:10%; width:100%; justify-content:space-evenly; align-items:center">
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:40%">
                                            <label for="exampleInputCategoria" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Categoria</label>
                                            <input type="text" readonly class="form-control" value="" name="categoria-show" id="categoria-show" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:40%">
                                            <label for="exampleInputValor" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Valor Total</label>
                                            <input type="text" readonly class="form-control" value="" name="valorlocinput" id="valorlocinput" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px; width:80%;">
                                        </div>
                                    </div>
                                    <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">
                                        <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%">
                                            <label for="exampleInputSenha" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Senha</label>
                                            <input type="password" class="form-control" value="" name="senha" id="senha" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" onclick="submitData()">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; justify-content: center; width:100%; gap: 2%; margin-top: 2%">
                <div style="background-color: #e2dfdfff; border-radius:10px">
                    <div>
                        <img src="images/jeep.png" alt="" srcset="">
                    </div>
                    <div style="display:flex; justify-content:center">
                        <h4 style="color:#165F2B;">Jeep Renegade</h4>
                    </div>
                    <div style="display:flex; justify-content:center">
                        <a class="btnsolicita" href="" data-bs-toggle="modal" onclick="pegaCategoria('SUV')" data-bs-target="#staticBackdrop">Solicitar</a>
                    </div>
                </div>
                <div style="background-color: #e2dfdfff; border-radius:10px">
                    <div>
                        <img src="images/Creta.png" alt="" srcset="">
                    </div>
                    <div style="display:flex; justify-content:center">
                        <h4 style="color:#165F2B;">Hyundai Creta</h4>
                    </div>
                    <div style="display:flex; justify-content:center">
                        <a class="btnsolicita" href="" data-bs-toggle="modal" onclick="pegaCategoria('SUV')" data-bs-target="#staticBackdrop">Solicitar</a>
                    </div>
                </div>
                <div style="background-color: #e2dfdfff; border-radius:10px">
                    <div>
                        <img src="images/corolla.png" alt="" srcset="">
                    </div>
                    <div style="display:flex; justify-content:center">
                        <h4 style="color:#165F2B;">Toyota Corolla Cross</h4>
                    </div>
                    <div style="display:flex; justify-content:center">
                        <a class="btnsolicita" href="" data-bs-toggle="modal" onclick="pegaCategoria('Sedan')" data-bs-target="#staticBackdrop">Solicitar</a>
                    </div>
                </div>
                <div style="background-color: #e2dfdfff; border-radius:10px">
                    <div>
                        <img src="images/Honda.png" alt="" srcset="">
                    </div>
                    <div style="display:flex; justify-content:center">
                        <h4 style="color:#165F2B;">Honda HR-V</h4>
                    </div>
                    <div style="display:flex; justify-content:center">
                        <a class="btnsolicita" href="" data-bs-toggle="modal" onclick="pegaCategoria('SUV')" data-bs-target="#staticBackdrop">Solicitar</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section style="display: flex; justify-content:center; flex-direction: column; align-items:center; margin-top:2%" id="nos">
        <h3 style="color: #165F2B">Sobre Nós</h3>

        <div style=" display:flex; justify-content:center; align-items:center; ">

            <div style="background-color: #F2F2F2; width: 85%; display:flex; padding: 3%; justify-content:space-between; border-radius: 10px">

                <div style="width: 45%;">
                    <h4>Seu caminho mais rápido para dirigir com liberdade</h4>
                    <p>A LocaFast é uma locadora de carros criada para quem busca praticidade, conforto e rapidez na hora de alugar um veículo. Com uma frota moderna e variada, a empresa oferece desde carros econômicos para o dia a dia até modelos mais espaçosos e sofisticados para viagens ou ocasiões especiais.</p>
                    <p>Pensando na comodidade dos clientes, a LocaFast conta com um processo de locação simples e ágil, permitindo que você escolha seu carro em poucos minutos e saia dirigindo sem complicação. Além disso, a empresa prioriza a segurança e a qualidade, garantindo veículos revisados e prontos para qualquer trajeto.</p>
                    <p>Seja para trabalho, lazer ou emergência, a LocaFast é a escolha ideal para quem quer mobilidade com confiança e rapidez.</p>
                </div>

                <div style="width:45%">
                    <img src="images/about-us.png" alt="" style="width: 80%;">
                </div>


            </div>

        </div>

    </section>

    <section style="display: flex; justify-content:center; flex-direction:column; align-items:center; margin-top:2%" id="marcas">
        <h3 style="color: #165F2B; font-family: sans-serif;">Marcas</h3>

        <div class="external-ex">
            <div class="external">

                <img src="images/chevrolet.png" alt="Chevrolet" class="teste">
                <img src="images/fiat-logo.png" alt="Fiat" class="teste">
                <img src="images/jeep-loo.png" alt="Jeep" class="teste">
                <img src="images/ford-logo.png" alt="Ford" class="teste">
                <img src="images/chevrolet.png" alt="Chevrolet" class="teste">
                <img src="images/fiat-logo.png" alt="Fiat" class="teste">
                <img src="images/jeep-loo.png" alt="Jeep" class="teste">
                <img src="images/ford-logo.png" alt="Ford" class="teste">


                <img src="images/chevrolet.png" alt="Chevrolet" class="teste">
                <img src="images/fiat-logo.png" alt="Fiat" class="teste">
                <img src="images/jeep-loo.png" alt="Jeep" class="teste">
                <img src="images/ford-logo.png" alt="Ford" class="teste">
                <img src="images/chevrolet.png" alt="Chevrolet" class="teste">
                <img src="images/fiat-logo.png" alt="Fiat" class="teste">
                <img src="images/jeep-loo.png" alt="Jeep" class="teste">
                <img src="images/ford-logo.png" alt="Ford" class="teste">

                <img src="images/chevrolet.png" alt="Chevrolet" class="teste">
                <img src="images/fiat-logo.png" alt="Fiat" class="teste">
                <img src="images/jeep-loo.png" alt="Jeep" class="teste">
                <img src="images/ford-logo.png" alt="Ford" class="teste">
                <img src="images/chevrolet.png" alt="Chevrolet" class="teste">
                <img src="images/fiat-logo.png" alt="Fiat" class="teste">
                <img src="images/jeep-loo.png" alt="Jeep" class="teste">
                <img src="images/ford-logo.png" alt="Ford" class="teste">

            </div>
        </div>
    </section>


    <section style="display: flex; justify-content:center; align-items:center; margin-top: 1%; flex-direction: column" id="avaliacoes">
        <h3 style="color: #165F2B">Avaliações</h3>

        <div style="display: flex; justify-content:space-around; width:85%; margin-top:1%">

            <div style="width:28%; background-color:#44664C; padding:2%; justify-content:center; align-items:center; display:flex; flex-direction:column; border-radius:10px">
                <p style="color:white; text-align:center">Aluguei um carro com a LocaFast e tive uma experiência excelente! Desde o primeiro contato, o atendimento foi rápido e muito atencioso. O processo de locação é super simples, sem burocracia, e em poucos minutos eu já estava com o carro pronto para uso.</p>
                <h4 style="color:white; text-align:center">Kaique</h4>
                <img src="images/rate.png" alt="">
            </div>

            <div style="width:28%; background-color:#44664C; padding:2%; justify-content:center; align-items:center; display:flex; flex-direction:column; border-radius:10px">
                <p style="color:white; text-align:center">Minha experiência com a LocaFast foi muito boa! Precisava de um carro com urgência e consegui resolver tudo de forma rápida e prática. O atendimento foi educado e eficiente, tiraram todas as minhas dúvidas na hora.</p>
                <h4 style="color:white; text-align:center">Icaro</h4>
                <img src="images/rate.png" alt="">
            </div>

            <div style="width:28%; background-color:#44664C; padding:2%; justify-content:center; align-items:center; display:flex; flex-direction:column; border-radius:10px">
                <p style="color:white; text-align:center">Fiquei muito satisfeito com o serviço da LocaFast! A equipe foi super prestativa e me ajudou a escolher o carro ideal para minha viagem. Todo o processo foi rápido e sem complicação, exatamente como prometido.</p>
                <h4 style="color:white; text-align:center">Murillo</h4>
                <img src="images/rate.png" alt="">
            </div>

        </div>

    </section>

    <footer style="background-color: #F2F2F2; margin-top:2%;" class="footer">

        <img src="images/Logo.png" alt="" style="width: 20%;">

        <div style="margin: 2%; width: 12%">
            <img src="images/facebook.png" alt="" style="margin: 2%;">
            <img src="images/twitter.png" alt="" style="margin: 2%;">
            <img src="images/instagram.png" alt="" style="margin: 2%;" 1>
        </div>

        <div
            style="width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column;">

            <div style="width: 100%; display: flex; justify-content: space-around; align-items: center; flex-direction: row;">
                <a href="" style="text-decoration: none;margin-top: 5%;">
                    <h3 style="color: #165F2B;">Home</h3>
                </a>
                <a href="#carros" style="text-decoration: none;margin-top: 5%;">
                    <h3 style="color: #165F2B;">Nossos Carros</h3>
                </a>
                <a href="#nos" style="text-decoration: none;margin-top: 5%;">
                    <h3 style="color: #165F2B;">Sobre Nós</h3>
                </a>

                <a href="#marcas" style="text-decoration: none;margin-top: 5%;">
                    <h3 style="color: #165F2B;">Marcas</h3>
                </a>

                <a href="#avaliacoes" style="text-decoration: none;margin-top: 5%;">
                    <h3 style="color: #165F2B;">Avaliações</h3>
                </a>

            </div>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


    <style>
        .external-ex {
            overflow: hidden;
            display: flex;
            background-color: #8ADC36;
            padding: 1% 0;
            width: 100%;
        }

        .external {
            display: flex;
            align-items: center;
            width: max-content;
            animation: scroll 30s linear infinite;
            gap: 3rem;
        }


        .external:hover {
            animation-play-state: paused;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {

                transform: translateX(-50%);
            }
        }

        .teste {

            height: 50px;
            object-fit: contain;
        }


        .footer {
            margin-top: 5%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .footer {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        .btnsolicita {
            text-decoration: none;
            color: #165F2B;
            background-color: #8ADC36;
            font-size: 20px;
            padding: 2%;
            border-radius: 10px;
            margin-bottom: 2%
        }
    </style>

    <script src="JS/solicita.js"></script>
</body>

</html>