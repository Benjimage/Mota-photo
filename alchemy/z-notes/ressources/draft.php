<div class="container">
    <div class="filters-container">
        <div class="selects-taxonomies">
            <div class="custom-dropdown" id="select-categories">
                <button class="dropdown-button" id="mainDropdownButtonCategories">CATÉGORIES</button>
                <div class="dropdown-content">
                    <button class="dropdown-item dropdown-item--title-colors" data-value="">Catégories</button>
                    <?php $fields = get_terms(array('taxonomy' => 'categorie-photo')); ?>
                    <?php if ($fields): ?>
                        <?php foreach ($fields as $value): ?>
                            <?php if ($value && isset($value->slug) && isset($value->name)): ?>
                                <button class="dropdown-item" data-value="<?= $value->slug ?>"><?= $value->name ?></button>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

    <!-- ----------------------------------------------------- -->
            <!-- liste deroulante Formats -->
            <div class="custom-dropdown" id="select-formats">
                <button class="dropdown-button" id="mainDropdownButtonFormats">FORMATS</button>
                <div class="dropdown-content">
                    <button class="dropdown-item dropdown-item--title-colors" data-value="">Formats</button>
                    <?php $fields = get_terms(array('taxonomy' => 'format')); ?>
                    <?php if ($fields): ?>
                        <?php foreach ($fields as $value): ?>
                            <?php if ($value && isset($value->slug) && isset($value->name)): ?>
                                <button class="dropdown-item" data-value="<?= $value->slug ?>"><?= $value->name ?></button>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    <!-- ----------------------------------------------------- -->
        <!-- liste deroulante date -->

        <div class="custom-dropdown" id="select-by-date">
            <button class="dropdown-button" id="mainDropdownButtonDate">TRIER PAR</button>
                <div class="dropdown-content">
                    <button class="dropdown-item dropdown-item--title-colors" data-value="">Trier par</button>
                    <button class="dropdown-item" data-value="desc">Plus récents</button>
                    <button class="dropdown-item" data-value="asc">Plus anciens</button>
                </div>
        </div>
</div>