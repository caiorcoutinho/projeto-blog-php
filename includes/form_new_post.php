<form action = "new_post.php" method="POST" enctype="multipart/form-data">
    <pre>
<label name="title" >Título da postagem</label>
<input type="text" name="title" id="title" required>
<label name="img">Anexar imagem</label>   
<input type="file" name="img" id="img" accept="image/*" value="">
<label name="content">Conteúdo</label>
<textarea name="content" id="content" required></textarea>
<label name="tags">TAGS (separe por vírgula)</label>
<input type="text" name="tags" id="tags" required>
<button type="submit">Postar</button>
</pre>
    
</form>