<div class="middle less">
  <div class="left-box">
    <div class="custom-select" style="width:48%;">
      <select name="categorie">
        <option value="">Catégorie</option>
        <?php
        $categories = get_terms('categories-photos');
        foreach ($categories as $category) {
          echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
        }
        ?>
      </select>
    </div>

    <div class="custom-select" style="width:48%;">
      <select name="formats">
        <option value="Formats">Formats</option>
        <?php
        $formats = get_terms('format');
        foreach ($formats as $format) {
          echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
        }
        ?>
      </select>
    </div>
  </div>
  <div class="custom-select" style="width:25%;">
    <select id="date">
      <option value="DESC">Trier par </option>
      <option value="DESC">ordre décroissant</option>
      <option value="ASC">ordre croissant</option>
    </select>
  </div>
</div>