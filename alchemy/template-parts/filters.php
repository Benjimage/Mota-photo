<div class="filters">
  <div class="box-filter">
      <select id="categorie">
        <option value="">Catégorie</option>
        <?php
        $categories = get_terms('categories-photos');
        foreach ($categories as $category) {
          echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
        }
        ?>
      </select>

      <select id="formats">
        <option value="">Formats</option>
        <?php
        $formats = get_terms('format');
        foreach ($formats as $format) {
          echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
        }
        ?>
      </select>
  </div>
  <div class="box-filter">
    <select id="date">
      <option value="DESC">Trier par </option>
      <option value="DESC">ordre décroissant</option>
      <option value="ASC">ordre croissant</option>
    </select>
  </div>
</div>