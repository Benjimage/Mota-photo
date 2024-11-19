<select name="formats">
  <option value="Formats" selected disabled>Formats</option>
  <?php
  $formats = get_terms('format');
  foreach($formats as $format) {
    echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
  }
  ?>
</select>
