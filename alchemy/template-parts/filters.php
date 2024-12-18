<div class="middle less">
  <div class="left-box">
      <select id="categorie" style="width:48%" selected enabled>
        <option value="">Catégorie</option>
        <?php
        $categories = get_terms('categories-photos');
        foreach ($categories as $category) {
          echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
        }
        ?>
      </select>

      <select id="formats" style="width:48%">
        <option value="">Formats</option>
        <?php
        $formats = get_terms('format');
        foreach ($formats as $format) {
          echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
        }
        ?>
      </select>
  </div>
    <select id="date" style="width:25%">
      <option value="DESC">Trier par </option>
      <option value="DESC">ordre décroissant</option>
      <option value="ASC">ordre croissant</option>
    </select>
</div>