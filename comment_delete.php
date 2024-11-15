<Form action = 'treatment_delete_comment.php' method='POST'>
    <input name="id" value = "<?= $all_comments['id']?>" type="hidden"/>
    <button name = "delete" class = "btn btn-danger" type="submit">Supprimer le commentaire</button>
</Form>