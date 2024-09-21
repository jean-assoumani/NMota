<!-- Affichage des filtres pour trier les photos par catégorie, format et date. -->

<div class="filter-container">
    <div class="filter-group-left">
        <!-- Filtrage par Catégories -->
        <div class="custom-dropdown" id="filter-category-dropdown">
            <div class="selected" data-value="">Catégories</div>
            <div class="dropdown-options">
                <?php
                    // Récupération de toutes les catégories de la taxonomie "categorie"
                    $categories = get_terms(['taxonomy' => 'categorie', 'hide_empty' => false]);
                    // Boucle pour afficher chaque catégorie dans le menu déroulant
                    foreach ($categories as $category) {
                        echo '<div class="option" data-value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</div>';
                    }
                ?>
            </div>
        </div>
        <!-- Filtrage par Formats -->
        <div class="custom-dropdown" id="filter-format-dropdown">
            <div class="selected" data-value="">Formats</div>
            <div class="dropdown-options">
                <?php
                    // Récupération de tous les formats de la taxonomie "format"
                    $formats = get_terms(['taxonomy' => 'format', 'hide_empty' => false]);

                    // Boucle pour afficher chaque format dans le menu déroulant
                    foreach ($formats as $format) {
                        echo '<div class="option" data-value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="filter-group-right">

        <!-- Affiche un menu déroulant pour trier les photos par ordre de date. -->
        <div class="custom-dropdown" id="filter-sort-dropdown">
            <div class="selected" data-value="">Trier par</div>
            <div class="dropdown-options">
                <div class="option" data-value="desc">Plus récentes</div>
                <div class="option" data-value="asc">Plus anciennes</div>
            </div>
        </div>
    </div>
</div>