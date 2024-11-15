<Form action = 'treatment_delete_article.php' method='POST'>
    <input name="id" value = "<?= $article['id']?>" type="hidden"/>
    <button name = "delete" class = "btn btn-danger" type="submit">Supprimer l'annonce</button>
</Form>