<?php $message = ""?>
<form action="" method="post">
        Usuario:
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>"/>
        
        Password:
        <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>"/>

        <input type="submit" name="enviar" value="Enviar"/>
        <span><?php echo $message?></span>
    </form>