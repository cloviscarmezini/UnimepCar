<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= URL_BASE.'assets/js/jquery.js'?>"></script>
<script src="<?= URL_BASE.'assets/js/jquery.mask.min.js'?>"></script>
<script src="<?= URL_BASE.'assets/js/popper.js'?>"></script>
<script src="<?= URL_BASE.'assets/js/bootstrap.js'?>"></script>
<script>
    $(function(){
        var screen = $(document).height();
        var browser = $(window).height();
        if(screen > browser){
            $('.nav-lateral').height('100%');
        }
        $('[data-toggle="popover"]').popover();


        $('.modal_btn').on('click',function(){
            id = $(this).attr('id');
        });
        $('#btn_excluir').on('click',function(e){
            e.preventDefault();
            link = $(this).attr('href');
            link = link+id;
            window.location.href = link;
        });
        
        $('#senhaModal #troca_senha').on('click',function(){
            var senhaAtual = $('#senhaModal #senhaAtual').val();
            var senhaNova = $('#senhaModal #senhaNova').val();
            var id_usuario = $('#senhaModal #id_usuario').val()
            if(senhaAtual == '' || senhaNova == ''){
                $('#retorno-campos').removeClass('d-none');
            }
            else{
                $.ajax({
                    url : '<?=URL_BASE.'usuario/altera_senha'?>',
                    type : 'post',
                    dataType: 'json',
                    data : {
                        senhaAtual : senhaAtual,
                        id_usuario : id_usuario,
                        senhaNova : senhaNova
                    },
                    success : function(data){
                        $('#retorno-campos').removeClass('d-none');
                        $('#retorno-campos').removeClass('alert-danger');
                        $('#retorno-campos').addClass('alert-success');
                        $('#retorno-campos').html(data.sucesso);
                    },
                    error: function(data){
                        $('#retorno-campos').removeClass('d-none');
                        $('#retorno-campos').removeClass('alert-danger');
                        $('#retorno-campos').addClass('alert-warning');
                        $('#retorno-campos').html(data.erro);
                    }
                })

            }

        });

        $.getJSON('<?=URL_BASE.'veiculo/lista_fabricantes'?>',function(data){
            var fabricante = "<?php echo isset($veiculo['codigo_marca']) ? $veiculo['codigo_marca'] : ''; ?>";
            var qtd = Object.keys(data).length;
            for(var i = 0; i < qtd; i++){
                if(fabricante != '' && fabricante == data[i].codigo_marca){
                    $('#fabricante').append('<option value="'+data[i].codigo_marca+'" selected>'+data[i].marca+'</option>');
                    mostra_modelo(data[i].codigo_marca);
                }
                else{
                    $('#fabricante').append('<option value="'+data[i].codigo_marca+'">'+data[i].marca+'</option>');
                }
            }
        })

        $('#fabricante').on('change', function(){
            var fabricante_id = $(this).val().toString();
            mostra_modelo(fabricante_id);
        });

        $('#modelo').on('change',function(){ 
            var codigo_fipe = $(this).val();
            codigo_fipe = $('option[value="'+codigo_fipe+'"]').attr('data-qry').toString();
            mostra_ano(codigo_fipe);
        });

        function mostra_modelo(fabricante_id){
            var modelo = "<?php echo isset($veiculo['codigo_modelo']) ? $veiculo['codigo_modelo'] : ''; ?>";
            $.getJSON('<?=URL_BASE.'veiculo/lista_modelos/'?>'+fabricante_id,function(data){
                var qtd = Object.keys(data).length;
                $('#modelo').html('<option value="0">Selecione...</option>');
                for(var i = 0; i < qtd; i++){
                    if(modelo != '' && modelo == data[i].codigo_modelo){
                        $('#modelo').removeAttr("disabled");
                        $('#modelo').append('<option value="'+data[i].codigo_modelo+'" selected data-qry="'+data[i].codigo_fipe+'">'+data[i].modelo+'</option>');
                        mostra_ano(data[i].codigo_fipe);
                    }
                    else{
                        $('#modelo').append('<option value="'+data[i].codigo_modelo+'" data-qry="'+data[i].codigo_fipe+'">'+data[i].modelo+'</option>');
                    }
                }
                $('#modelo').removeAttr("disabled");
            })
        }

        function mostra_ano(codigo_fipe){
            var ano = "<?php echo isset($veiculo['ano']) ? $veiculo['ano'] : ''; ?>";
            $.getJSON('<?=URL_BASE.'veiculo/lista_anos/'?>'+codigo_fipe,function(data){
                var qtd = Object.keys(data).length;
                $('#ano').html('<option value="0">Selecione...</option>');
                for(var i = 0; i < qtd; i++){
                    if(ano != '' && ano == data[i].ano){
                        $('#ano').removeAttr("disabled");
                        $('#ano').append('<option value="'+data[i].ano+'" selected ">'+data[i].ano+'</option>');
                    }
                    else{
                        $('#ano').append('<option value="'+data[i].ano+'">'+data[i].ano+'</option>');
                    }
                }
                $('#ano').removeAttr("disabled");
            })
        }
        $('#busca_cliente').on('click',function(e){
            e.preventDefault();
            var campo = 'nome';
            var res = $('#campo_busca').val();

            $.ajax({
                url : '<?=URL_BASE.'cliente/pesquisa_cliente'?>',
                type : 'post',
                dataType: 'json',
                data : {
                    campo : campo,
                    res : res
                },
                success : function(data){
                    var qtd = Object.keys(data).length;
                    $('select#id_cliente').html('');
                    for(var i = 0; i < qtd; i++){
                        $('select#id_cliente').append('<option value="'+data[i].id+'">'+data[i].nome+'  | CPF: '+data[i].cpf+'</option>');
                    }
                }
            })
            var id_cliente = $('select#id_cliente option:selected').val();
            pesquisa_veiculo(id_cliente);
        })
        $('select#id_cliente').on('change', function(){
            var id_cliente = $(this).val().toString();
            pesquisa_veiculo(id_cliente);
        });
        function pesquisa_veiculo(id_cliente){
            var modelo = "<?php echo isset($veiculo['codigo_modelo']) ? $veiculo['codigo_modelo'] : ''; ?>";
            $.ajax({
                url : '<?=URL_BASE.'veiculo/pesquisa_veiculo_cliente'?>',
                type : 'post',
                dataType: 'json',
                data : {
                    id_cliente : id_cliente
                },
                success : function(data){
                    var qtd = Object.keys(data).length;
                    $('select#id_veiculo').html('');
                    for(var i = 0; i < qtd; i++){
                        $('select#id_veiculo').append('<option value="'+data[i].id+'">'+data[i].fabricante+'  | '+data[i].modelo+'</option>');
                    }
                }
            })
        }

        $('select#id_peca').on('change', function(){
            var id_peca = $(this).val().toString();
            pesquisa_peca(id_peca);
        });
        function pesquisa_peca(id_peca){
            var campo = 'id';
            var res = id_peca;

            $.ajax({
                url : '<?=URL_BASE.'peca/pesquisa_peca'?>',
                type : 'post',
                dataType: 'json',
                data : {
                    campo : campo,
                    res : res
                },
                success : function(data){
                    $('#estoque_atual').val(data[0].estoque);
                }
            })
        }


        $('#busca_peca').on('click',function(e){
            e.preventDefault();
            var campo = 'descricao';
            var res = $('#campo_busca_peca').val();

            $.ajax({
                url : '<?=URL_BASE.'peca/pesquisa_peca'?>',
                type : 'post',
                dataType: 'json',
                data : {
                    campo : campo,
                    res : res
                },
                success : function(data){
                    var qtd = Object.keys(data).length;
                    $('select#id_peca').html('');
                    for(var i = 0; i < qtd; i++){
                        $('select#id_peca').append('<option value="'+data[i].id+'">'+data[i].descricao+'  | Marca: '+data[i].marca+'</option>');
                    }
                }
            })
            var qtd_estoque = $('select#id_peca :selected').val();
            pesquisa_peca(qtd_estoque);
        })



        $('.cpf').mask('000.000.000-00', {reverse: true});
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        $('.tel').mask(SPMaskBehavior, spOptions);
        $('.cep').mask('00000-000');

        $( "#campo_pesquisa" ).on( "click", function() {
            var parametro = $('#parametro_pesquisa option:selected').val();
            if(parametro == 'cpf'){
                $(this).mask('000.000.000-00', {reverse: true});
            }
            else{
                $(this).unmask();
            }
        });
        $('.date').mask('00/00/0000');

        $('.adiciona_item').on('click',function(){
            var item = $('.desc_item:last-child').val();
            var val_item = $('.valor_item:last-child').val();
            if(item == '' || val_item == ''){
                alert('Preencha os campos corretamente!');
            }
            else{
                var html = '<div class="form-row item border-top py-3"><div class="form-group col-md-6"><label for="desc_item">Item adicionado</label><input class="form-control" type="text" name="itens[]"  value="'+item+'" placeholder="Descrição do item"></div><div class="form-group col-md-4"><label for="valor_item">Valor</label><input class="form-control" type="text"  name="valor_item[]" value="'+val_item+'" placeholder="Digite o valor deste item"></div><div class="form-group col-md-2 text-center"><label>Remover item</label><a class="text-danger h3 d-block remove_item"><i class="fas fa-minus-circle"></i></a></div></div>';
                $('.itens').append(html);
                $('.remove_item').on('click',function(){
                    $(this).parent().parent().remove();
                });
                $('.item:nth-of-type(1) input').val('');
            }
        });
        $('.remove_item').on('click',function(){
                    $(this).parent().parent().remove();
                });
        $('.remove_item').on('click',function(){
                    $(this).parent().parent().remove();
            });
        $('.adiciona_peça').on('click',function(e){
            var peca = $('#id_peca').val();
            var txt_peca = $('#id_peca :selected').text();
            var qtd_peca = $('#qtd_peca').val();
            var estoque = $('#estoque_atual').val();
            var estoque_atual = $('#estoque_atual').val() - qtd_peca;
            if(peca && qtd_peca){
                if(parseInt(qtd_peca)>parseInt(estoque)){
                    alert('Estoque insuficiente');
                }
                else{
                    $('#lista_pecas').append('<div class="form-row"><hr><div class="form-group col-md-6"><label>Peça adicionada</label><input class="form-control" value="'+txt_peca+'" readonly></div><div class="form-group col-md-2"><label>Qtd adicionada</label><input class="form-control" name="qtd_peca[]" value="'+qtd_peca+'"></div><div class="form-group col-md-2"><label>Estoque Atual</label><input class="form-control" value="'+estoque_atual+'" readonly><input name="peca[]" type="hidden" value="'+peca+'"></div><div class="form-group col-md-2 text-center"><label>Remover peça</label><a class="text-danger h3 d-block remove_item"><i class="fas fa-minus-circle"></i></a></div></div>');
                }
            }
            else{
                alert('Insira uma peça e a quantidade')
            }
            $('.remove_item').on('click',function(){
                    $(this).parent().parent().remove();
            });
        });
    });
</script>