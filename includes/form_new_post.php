<form action = "new_post.php" method="POST" enctype="multipart/form-data">

    <label name="title" >Título da postagem</label> <br>
    <input type="text" name="title" id="title" required><br>
    <label name="img">Anexar imagem</label>   <br>
    <input type="file" name="img" id="img" accept="image/*" value=""><br>
    <label name="content">Conteúdo</label><br>
    <textarea name="content" id="content" required></textarea><br>
    <button type="submit">Postar</button><br>

    
</form>