<div class="col-md-12">
    <h4 class="text-center mb-5">Calcula la cantidad de alimento para tú mascota</h4>

    <form method="get" name="filters" id="filters">
        <div class="row">
            <div class="col-md-6 form-group">
                <label class="h-5">Tipo de mascota:</label>
                <select class="form-control" name="type-pet" id="type-pet" required="required">
                    <option value="">Seleccione..</option>
                    <?php
                    foreach (get_terms('type-pet', array('hide_empty' => false)) as $type) {
                        echo "<option value='" . $type->slug . "'>" . $type->name . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-6 form-group">
                <label class="h-5">Peso de tu mascota:</label>
                <select class="form-control" name="weight-pet" id="weight-pet" required="required">
                    <option value="">Seleccione..</option>
                    <?php
                    foreach (get_terms('weight-pet', array('hide_empty' => false)) as $type) {
                        echo "<option value='" . $type->slug . "'>" . $type->name . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-12 form-group">
                <label class="h-5">Rango de edad de tu mascota:</label>
                <select class="form-control" name="age-pet" id="age-pet" required="required">
                    <option value="">Seleccione..</option>
                    <?php
                    foreach (get_terms('age-pet', array('hide_empty' => false)) as $type) {
                        echo "<option value='" . $type->slug . "'>" . $type->name . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-center my-3">
            <button type="submit" name="btn-buscar" class='btn btn-block btn-outline-dar' id='search-post'>Calcular</button>
        </div>
    </form>


    <div id="content-pets"></div>
</div>