<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Верхняя панель -->
    <div class="container">    
        <a class="navbar-brand" href="/"><?php echo $Login?></a>
        <div class="text-end py-3">
            <?php if($Login == 'admin'){
                echo <<<_TEXT
                    <a href="/?verify=1" class="btn btn-outline-light me-2">Подтвердить регистрацию</a>
                _TEXT;
            }?>
            <a class="btn btn-outline-light me-2" onclick='getConfirmation()'>Выйти</a>
        </div>
    </div>
</nav>

<script>
    // Подтверждение выхода
    function getConfirmation(){
    var a = confirm("Вы действительно хотите выйти?");
    if( a == true ){
        document.location.href = "Controllers/logout.php"
    }
    }
</script>