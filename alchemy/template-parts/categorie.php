<select name="categorie">
  <option value="" selected disabled>Catégorie</option>
  <?php
  $categories = get_terms('categories-photos');
  foreach($categories as $category) {
    echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
  }
  ?>
</select>
