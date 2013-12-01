<!DOCTYPE HTML>
<html>
    <head>
        <title>Цахим Сургалтын Систем</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/bootstrap-editable.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/css/style.css" />
        <script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/bootstrap-editable.js"></script>
        <script src="<?php echo BASE_URL; ?>/js/script.js"></script>
        <script src="<?php echo BASE_URL; ?>/sites/<?php echo HOSTNAME; ?>/js/script.js"></script>
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <div id="content" class="container">
            <div class="page-header">
                <h1><?php echo $this->title; ?></h1>
            </div>
            <?php if (User::getInstance()->isGuest()) { ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" class="namefield" tabindex="1" size="18" placeholder="Цахим шуудангийн хаяг">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-key"></i></span><input type="password" name="password" class="passfield" tabindex="2" size="18" placeholder="Нууц үг">
                    </div>
                    <button type="submit" tabindex="3" name="signin" class="btn btn-primary"><i class="icon-arrow-right"></i></button>
                    <div id="form-login-remember" class="control-group checkbox">
                        <label for="modlgn-remember" class="control-label"><input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes">Сануулах</label>
                    </div>
                </form>
            <?php } else { ?>
                <div class="items">
                    Асуулт <a href = "#" class = "fldVal" data-name = "question" data-type = "text" data-pk = "<?php echo $this->lsnId; ?>"></a>
                    Хариулт <a href = "#" class = "fldVal" data-name = "answer" data-type = "text" data-pk = "<?php echo $this->lsnId; ?>"></a>
                    Төрөл <a href = "#" class = "fldVal" data-name = "type" data-type = "text" data-pk = "<?php echo $this->lsnId; ?>"></a>
                    Түвшин <a href = "#" class = "fldVal" data-name = "level" data-type = "number" data-pk = "<?php echo $this->lsnId; ?>"></a>
                    Сэдэв <a href = "#" class = "fldVal" data-name = "topic" data-type = "text" data-pk = "<?php echo $this->lsnId; ?>"></a>

                    <span class="submit btn btn-primary">Бүртгүүлэх</span>
                    <?php foreach ($this->questions as $question) {
                        $answer = json_decode($question['Answer']); ?>
                        <h3 class="lsn-<?php echo $question['QstID']; ?>">
                            <?php echo $question['Question']; ?>
                        </h3>
                        <?php 
                        switch($question['Type']){
                            case 1:
                                $i = 'a';
                                foreach($answer as $item){
                                    ?><p><label>
                                            <input type="radio" name="q-<?php echo $question['QstID']; ?>"> <?php echo $i++;?>. <?php echo $item;?></label></p><?php
                                }
                                break;
                            case 2:
                                $i = 'a';
                                foreach($answer as $item){
                                    ?><p><label>
                                            <input type="checkbox" name="q-<?php echo $question['QstID']; ?>"> <?php echo $i++;?>. <?php echo $item;?></label></p><?php
                                }
                                break;
                        }
                        ?>
                        <?php echo $question['Lvl']; ?>
                        <?php echo $question['TpcNm']; ?>
                        <?php
                    }
                    ?>
                    <script language="javascript">
                        (function($) {
                            $(document).ready(function() {
                                // $.ajaxUpload($('#imageUpload'));
                                var setEditable = function(element) {
                                    element.editable({mode: "inline", send: 'auto',
                                        url: "<?php echo $_SERVER['PHP_SELF']; ?>",
                                        emptytext: 'хоосон',
                                        validate: function(value) {
                                            if ($(this).hasClass('required') && $.trim(value) === '')
                                                return 'Энэ талбарыг заавал бөглөх хэрэгтэй';
                                        },
                                        success: function(response, newValue) {
                                            if (response && response.status === 'error') {
                                                return response.msg; //msg will be shown in editable form
                                            } else if (newValue === '') {
                                                $(this).remove();
                                            } else if ($(this).hasClass('editable-empty') &&
                                                    $(this).parent().hasClass('multi')) {
                                                var clone = $(this).clone().removeAttr('class').removeAttr('style').html('');
                                                $(this).after(clone);
                                                setEditable(clone);
                                            }
                                        }
                                    });
                                };
                                var el = $('.fldVal');
                                setEditable(el);
                                $('.submit').click(function(e) {
                                    var isfull = true;
                                    el.each(function(e) {
                                        if ($(this).hasClass('editable-empty') && $(this).hasClass('required')) {
                                            isfull = false;
                                        }
                                    });
                                    if (!isfull) {
                                        alert('Талбаруудаа гүйцэд бөглөнө үү');
                                    } else {
                                        var values = el.editable('getValue');
                                        for (var prop in values) {
                                            // important check that this is objects own property 
                                            // not from prototype prop inherited
                                            if (values[prop] === '') {
                                                delete values[prop];
                                            }
                                        }
                                        $("#loading").show();
                                        $.ajax({
                                            url: document.location,
                                            dataType: "jsonp",
                                            jsonpCallback: 'callback',
                                            data: values,
                                            type: "POST"
                                        }).done(function(data) {
                                            if (data.status) {
                                                window.location.reload();
                                            }
                                        }).always(function() {
                                            $("#loading").hide();
                                        });
                                    }
                                });
                            });
                        })(jQuery);
                    </script>

                </div>
            <?php } ?>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 