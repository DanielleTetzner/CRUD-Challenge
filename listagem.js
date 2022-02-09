$(document).ready(function () {

    //--------------MUDA INTERFACE COM BASE NO USUARIO-----------------------------------------------------------------------------------------------------------------
    
    const login    = localStorage.getItem('login');
    const userType = localStorage.getItem('userType');
    

    if (userType == "1") {

        $("#header")   .removeClass('title0')    .addClass('title1')
        $("#nav")      .removeClass('nav')       .addClass('nav1')
        $("#saudacao") .removeClass('saudacao')  .addClass('saudacao1')
        $("#btnLogout").removeClass('btnLogout') .addClass('btnLogout1')

    } else {
    
        $("#header").removeClass('title1').addClass('title0')
    
    }

    //--------------LISTA NA TELA-----------------------------------------------------------------------------------------------------------------
    
    $.ajax({
        url: "Php/get.php?acao=listClient&login=" + login + "&userType=" + userType,
        method: "GET",
        success: function (res) {

            
            let listagem = res.map((client) => {

                const {
                    name,
                    name_client,
                    cpf,
                    rg,
                    email,
                    tel1,
                    tel2,
                    birth,
                    id,
                    active } = client;

                    let textobtn = "Inativo"

                    if (active == 1){
                        textobtn ="Ativo"
                    }

                return (`

                <tr>
                    <td><img class="userninja"src="images/client1.png"></td>
                    <td>${name_client}</td>
                    <td>${cpf}</td>
                    <td>${rg}</td>
                    <td>${email}</td>
                    <td>${tel1}</td>
                    <td>${tel2}</td>
                    <td>${birth}</td>
                    <td class="user_id">${name}</td>
                    <td>
                    <a id="editbutton" class="editbutton" data-toggle="modal" data-target="#employeeModal"
                    title="Editar" data-id="${id}">Editar</a>
                    <a id="endbutton" class="endbutton" data-toggle="modal" data-target="#endModal"
                    title="Novo Endereço" data-id="${id}">Novo Endereço</a>
                    <a href="" id="endListbutton" class="endListbutton" data-toggle="modal" data-target="#endListmodal"
                    title="Endereços" data-id="${id}">Endereços</a>
                    <button type="button" id="deletebutton"  class="deletebutton deletebutton${active}" 
                    data-ativo="${active}"data-id="${id}" >${textobtn}</button>
                    </td>
                </tr>

                `);
            });

            $("#listagem").append(listagem);
            
    //---------VERIFICA SE É ADMIN-------------------------------------------------------------------------
            
    const logged = localStorage.getItem('logged');
    const userType = localStorage.getItem('userType');
    const name = localStorage.getItem('name');
    $("#saudacao").html("Olá, " + name);

            if ((logged) == 1 && (userType) == 1) {

                $(".deletebutton").show();
                $(".deletebuttonEnd").show();
                $(".user_id").show();

            } else if((logged) == null) {

                window.location = 'http://localhost/CRUD/index.php'

            }

            $("#btnLogout").on("click", function (e) {
                e.preventDefault();

                localStorage.clear();
                window.location = 'http://localhost/CRUD/index.php'
            })
            
            

    //---------CADASTRAR CLIENTE-------------------------------------------------------------------------
            $("#cadbutton").click(function (e) {
                e.preventDefault();
                
                $("#addform").submit(function (e) {
                e.preventDefault();
                const login = localStorage.getItem('login');

                const name = document.getElementById("name_register").value
                const cpf = document.getElementById("cpf_register").value
                const rg = document.getElementById("rg_register").value
                const email = document.getElementById("email_register").value
                const tel1 = document.getElementById("tel1_register").value
                const tel2 = document.getElementById("tel2_register").value
                const birth = document.getElementById("birth_register").value


                const objBody = {
                    acao: "clientRegister",
                    name_client: name,
                    cpf: cpf,
                    rg: rg,
                    email: email,
                    tel1: tel1,
                    tel2: tel2,
                    birth: birth,
                    login: login
                }

                $.ajax({
                    method: "POST",
                    url: "Php/post.php",
                    data: objBody,
                    success: function (res) {
                        location.reload();
                        console.log(res);
                    }
                })
                location.reload();
                alert('Sucesso');
            });
            });


    //-----------BTN CADASTRAR ENDEREÇO-------------------------------------------------------------------------------------------------

            $(".endbutton").on("click", function (e) {
                e.preventDefault();

                const idbtn = $(this).attr("data-id");

                $("#cadEndform").submit(function (e) {
                    e.preventDefault();

                    const id_client = idbtn
                    const state = document.getElementById("state").value
                    const CEP = document.getElementById("CEP").value
                    const city = document.getElementById("city").value
                    const district = document.getElementById("district").value
                    const street = document.getElementById("street").value
                    const number = document.getElementById("number").value

                    const objEnd = {
                        acao: "addressRegister",
                        state: state,
                        CEP: CEP,
                        city: city,
                        district: district,
                        street: street,
                        number: number,
                        id_client: id_client

                    }
                    console.log(objEnd);
                    $.ajax({
                        url: "Php/post.php?acao=addressRegister",
                        method: "POST",
                        data: objEnd,
                        success: function (res) {
                            location.reload();
                            alert('Sucesso');
                        }
                    });
                    location.reload();
                })
            });

    //------------BTN EDITAR CLIENTE-----------------------------------------------------------------------------------------------

            $(".editbutton").on("click", function (e) {
                e.preventDefault();

                const idbtn = $(this).attr("data-id");

                const urlCliente = "Php/get.php?acao=listUpdate&id=" + idbtn


                $.ajax({
                    url: urlCliente,
                    type: "GET",
                    success: function (res) {
                        const idUpdate    = res[0].id
                        const nameUpdate  = res[0].name_client
                        const cpfUpdate   = res[0].cpf
                        const rgUpdate    = res[0].rg
                        const emailUpdate = res[0].email
                        const tel1Update  = res[0].tel1
                        const tel2Update  = res[0].tel2
                        const birthUpdate = res[0].birth

                        $("#id").val(idUpdate);
                        $("#name").val(nameUpdate);
                        $("#cpf").val(cpfUpdate);
                        $("#rg").val(rgUpdate);
                        $("#email").val(emailUpdate);
                        $("#tel1").val(tel1Update);
                        $("#tel2").val(tel2Update);
                        $("#birth").val(birthUpdate);


                        $("#editButton").click(function (e) {
                            e.preventDefault();

                            if (confirm('Voce deseja mesmo editar os dados?')) {

                                const id    = document.getElementById("id").value
                                const name  = document.getElementById("name").value
                                const cpf   = document.getElementById("cpf").value
                                const rg    = document.getElementById("rg").value
                                const email = document.getElementById("email").value
                                const tel1  = document.getElementById("tel1").value
                                const tel2  = document.getElementById("tel2").value
                                const birth = document.getElementById("birth").value

                                const objUpdate = {
                                    acao: "clientUpdate",
                                    id: id,
                                    name_client: name,
                                    cpf: cpf,
                                    rg: rg,
                                    email: email,
                                    tel1: tel1,
                                    tel2: tel2,
                                    birth: birth

                                }

                                $.ajax({
                                    url: "Php/update.php",
                                    method: "POST",
                                    data: objUpdate,
                                    success: function (res) {
                                        location.reload()
                                    }
                                })
                            } else {
                                $('#employeeModal').modal('hide');
                            }
                        })

                    }

                })

            });

    //----------BTN ATIVAR/DESATIVAR CLIENTE------------------------------------------------------------------------------------------------------

    $(".deletebutton").on("click", function (e) {
        e.preventDefault();

        const idbotao  = $(this).attr("data-id");
        const btnativo = $(this).attr("data-ativo");

        if (btnativo == "1") {
            var funcao = 'desativar'
            $(idbotao).removeClass('deletebutton0').addClass('deletebutton1').attr('data-ativo', '0')
        } else {
            var funcao = 'ativar'
            $(idbotao).removeClass('deletebutton1').addClass('deletebutton0').attr('data-ativo', '1')
        }

        $.ajax({
            url: "Php/update.php",
            method: "POST",
            data: {
                acao: funcao,
                id: idbotao
            },
            success: function (res) {
                alert("Atualizado")
                location.reload()
                console.log(res)

            }
        })
    })

    //------------BTN LISTA ENDEREÇOS DE UM CLIENTE-------------------------------------------------------------------------------------

            $(".endListbutton").on("click", function (e) {
                e.preventDefault();
                const idbtn = $(this).attr("data-id");

                $("#modalEnd").hide();

                
                
                $.ajax({
                    url: "Php/get.php?acao=listAddress",
                    method: "GET",
                    data: {
                        id_client: idbtn
                    },
                    success: function (res) {

                        let listagemEnduser = res.map((address) => {

                            const {
                                state,
                                CEP,
                                city,
                                district,
                                street,
                                number,
                                id_client,
                                id_address,
                                main_address
                            } = address;

                            return (`
                        <tr>
                            <td>${state}</td>
                            <td>${CEP}</td>
                            <td>${city}</td>
                            <td>${district}</td>
                            <td>${street}</td>
                            <td>${number}</td>
                            <td>
                            <input type="button"  id="editbuttonEnd" class="editbuttonEndlist" 
                            title="Edit" data-id="${id_address}"value="Editar">
                            </td>
                            <td>
                            <input type="button" id="" class="prinbutton prinbutton${main_address}" 
                            title="Prin" data-user="${id_client}"data-ativo="${main_address}"data-id="${id_address}" value="Principal">
                            </td>
                            <td>
                            <a href="" id="deletebuttonEnd" class="deletebuttonEnd"
                            title="delete" data-id="${id_address}">Desativar</a>
                            </td>
                        </tr>
                    `);
                        });

                        $("#listagemEnduser tr").remove(); //reseta a lista para nao repetir endereços
                        $("#listagemEnduser").append(listagemEnduser);


    //----------------------PERMISSAO DE USUARIO---------------------------------------------------------------------------------

                if ((logged) == 1 && (userType) == 1) {

                $(".deletebutton").show();
                $(".deletebuttonEnd").show();
                } else {
                $(".deletebutton").hide();
                $(".deletebuttonEnd").hide();
                
                }




    //-----------BTN ENDEREÇO PRINCIPAL-------------------------------------------------------------------------------------------

                        $(".prinbutton").on("click", function (e) {
                            e.preventDefault();

                            const idbotao = $(this).attr("data-id");
                            const btnativo = $(this).attr("data-ativo");
                            const btnuser = $(this).attr("data-user");

                            if (btnativo == "2") {
                                var funcao = 'removeprin'
                                $(idbotao).removeClass('prinbutton1').addClass('prinbutton2').attr('data-ativo', '1')
                            } else {
                                var funcao = 'prinEnd'
                                $(idbotao).removeClass('prinbutton2').addClass('prinbutton1').attr('data-ativo', '2')
                            }

                            $.ajax({
                                url: "Php/update.php",
                                method: "POST",
                                data: {
                                    acao: funcao,
                                    id_client: btnuser,
                                    id_address: idbotao
                                },
                                success: function (res) {
                                    alert("Atualizado")
                                    location.reload()
                                    console.log(res)

                                }
                            })
                        })

    //------- BTN EDITAR ENDEREÇO-----------------------------------------------------------------------------------------------

                        $(".editbuttonEndlist").on("click", function (e) {
                            e.preventDefault();
                            const idbotao = $(this).attr("data-id");
                            const urlEnd = "Php/get.php?acao=addressUpdate&id=" + idbotao

                            $("#modalEnd").toggle();
                            
                            $.ajax({
                                url: urlEnd,
                                type: "GET",
                                success: function (res) {

                                    const id_addressUpdate = res[0].id_address
                                    const id_clientUpdate = res[0].id_client
                                    const stateUpdate = res[0].state
                                    const CEPupdate = res[0].CEP
                                    const cityUpdate = res[0].city
                                    const districtUpdate = res[0].district
                                    const streetUpdate = res[0].city
                                    const numberUpdate = res[0].number
                                    const main_address = res[0].main_address

                                    $("#stateList.form-control").val(stateUpdate);
                                    $("#CEPlist.form-control").val(CEPupdate);
                                    $("#cityList.form-control").val(cityUpdate);
                                    $("#districtList.form-control").val(districtUpdate);
                                    $("#streetList.form-control").val(streetUpdate);
                                    $("#numberList.form-control").val(numberUpdate);
                                    $("#id_address.form-control").val(id_addressUpdate);
                                    $("#id_client.form-control").val(id_clientUpdate);
                                    $("#main_address.form-control").val(main_address);

                                    $(".confirmarEndBtn").click(function (e) {
                                        e.preventDefault();

                                        const id_address = idbotao
                                        const state = document.getElementById("stateList").value
                                        const CEP = document.getElementById("CEPlist").value
                                        const city = document.getElementById("cityList").value
                                        const district = document.getElementById("districtList").value
                                        const street = document.getElementById("streetList").value
                                        const number = document.getElementById("numberList").value


                                        const objAddlist = {

                                            acao: "addressUpdate",
                                            state: state,
                                            CEP: CEP,
                                            city: city,
                                            district: district,
                                            street: street,
                                            number: number,
                                            id_address: id_address

                                        }

                                        $.ajax({
                                            url: "Php/update.php",
                                            method: "POST",
                                            data: objAddlist,
                                            success: function (res) {
                                                alert('Atualizado');
                                                location.reload()
                                            }
                                        })
                                    })

                                }

                            })

                        })

    //----------BTN DESATIVAR ENDEREÇO----------------------------------------------------------------------------------------------

                        $(".deletebuttonEnd").on("click", function (e) {
                            e.preventDefault();


                            const idbtn = $(this).attr("data-id");

                            $.ajax({
                                url: "Php/update.php",
                                method: "POST",
                                data: {
                                    acao: "deletarEnd",
                                    id: idbtn
                                },
                                success: function (res) {
                                    alert("Endereço desativado")
                                    location.reload()

                                }
                            })
                        })

                    }

                })

            })

        }

    });
});