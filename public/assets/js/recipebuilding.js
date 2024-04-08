
$(document).ready(function () {
    if ($("#recipe_final_info tr").length >= 1) {
        $('#no_ingredients').removeClass('d-none');
        $('#no_ingredients').addClass('d-none');
    }

    $('#ingredient_name').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    },
        {
            limit: 20,
            async: true,
            source: function (query, processSync, processAsync) {
                processSync([]);
                return $.ajax({
                    url: 'https://api.edamam.com/auto-complete',
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    type: "get", //send it through get method
                    data: {
                        q: $("#ingredient_name").val(),
                        app_id: 'c54e9c12',
                        app_key: 'a823bed1aaa86da3e4c6daaad436b595'
                    },
                    async: true,
                    crossDomain: true,
                    success: function (json) {
                        // in this example, json is simply an array of strings
                        console.log(json)
                        return processAsync(json);
                    }
                });
            }
        });

        calculate_total_values()

});

$('#clear_ingredient_info').on('click', function () {
    clear_ingredient_information_fields();
});

$('#add_ingredient_button').on('click', function () {
    if (!validate_ingredient_selection()) {
        return;
    }
    clear_ingredient_information_fields();
    insert_ingredient_information();
    searchIngredient();
    $('.ingredient_info_box').removeClass('d-none')

});

$('#add_ingredient_info').on('click', function () {

    if (!validate_ingredient_info()) {
        return;
    }
    ingredient_name = $('#ingredient_info_name').text();
    ingredient_amount = parseFloat($('#ingredient_info_amount').text());
    ingredient_calories = parseFloat($('#ingredient_info_calories').val());
    ingredient_proteins = parseFloat($('#ingredient_info_proteins').val());
    ingredient_carbohydrates = parseFloat($('#ingredient_info_carbohydrates').val());
    ingredient_fats = parseFloat($('#ingredient_info_fats').val());

    if ($("#recipe_final_info input[name='ingredient_name[]']").filter(function (i, obj) {
        if ($.trim(ingredient_name).toLowerCase() == $.trim(obj.value).toLowerCase()) {
            return true;
        }
    }).length > 0) {
        Swal.fire("Uh Oh!", "There is already an ingredient by that Name !");
        return;
    }

    element = `
        <tr class="font-weight-boldest" >
            <td class="border-0 pl-0 pt-7 d-flex align-items-center"><input type="text" class="form-control ingredient_info_final readonly_input_field text-left-override" name="ingredient_name[]" readonly value="${ingredient_name}" /></td>
            <td class="text-right pt-7 align-middle"><input type="text" class="form-control ingredient_info_final  amount_field" name="ingredient_amount[]"  value=${ingredient_amount} /></td>
            <td class="text-right pt-7 align-middle"><input type="text" class="form-control ingredient_info_final  calories_field" name="ingredient_calories[]"  value=${ingredient_calories} /></td>
            <td class="text-right pt-7 align-middle"><input type="text" class="form-control ingredient_info_final  proteins_field" name="ingredient_proteins[]"  value=${ingredient_proteins} /></td>
            <td class="text-right pt-7 align-middle"><input type="text" class="form-control ingredient_info_final  carbs_field" name="ingredient_carbohydrates[]"  value=${ingredient_carbohydrates} /></td>
            <td class="text-right pt-7 align-middle"><input type="text" class="form-control ingredient_info_final  fats_field" name="ingredient_fats[]"  value=${ingredient_fats} /></td>
            <td class="text-right pt-7 align-middle"><a  class="btn btn-danger font-weight-bolder font-size-sm remove_ingredient_info_from_list" >Remove</a></td>
        </tr>
    `;
    $('#recipe_final_info').append(element);

    if ($("#recipe_final_info tr").length >= 1) {
        $('#no_ingredients').removeClass('d-none');
        $('#no_ingredients').addClass('d-none');
    }
    clear_ingredient_information_fields();
    clear_ingredient_selection();
    $('.ingredient_info_box').removeClass('d-none');
    $('.ingredient_info_box').addClass('d-none');

    calculate_total_values()


});
$(document).on('click', '.remove_ingredient_info_from_list', function () {

    console.log($(this).closest('tr').remove());
    if ($("#recipe_final_info tr").length <= 0) {
        $('#no_ingredients').removeClass('d-none');
    }
    calculate_total_values()

});

function validate_ingredient_info() {

    ingredient_info_name = true;
    if ($.trim($('#ingredient_info_name').text()) == '' || $('#ingredient_info_name').text() == "No Ingredient Selected") {
        $('#ingredient_info_name').removeClass('text-danger');
        $('#ingredient_info_name').addClass('text-danger');
        $('#ingredient_info_name').removeClass('text-dark');
        ingredient_info_name = false;
    } else {
        $('#ingredient_info_name').removeClass('text-danger');
        $('#ingredient_info_name').removeClass('text-dark');
        $('#ingredient_info_name').addClass('text-dark');
        ingredient_info_name = true;
    }

    ingredient_info_amount = true;
    if ($.trim($('#ingredient_info_amount').text()) == '' || $('#ingredient_info_amount').text() == "--") {
        $('#ingredient_info_amount').removeClass('text-danger');
        $('#ingredient_info_amount').addClass('text-danger');
        $('#ingredient_info_amount').removeClass('text-dark');
        $('#ingredient_info_amount').closest('h4').removeClass('text-danger');
        $('#ingredient_info_amount').closest('h4').addClass('text-danger');
        $('#ingredient_info_amount').closest('h4').removeClass('text-dark');
        ingredient_info_amount = false;
    } else {
        $('#ingredient_info_amount').removeClass('text-danger');
        $('#ingredient_info_amount').removeClass('text-dark');
        $('#ingredient_info_amount').addClass('text-dark');
        $('#ingredient_info_amount').closest('h4').removeClass('text-danger');
        $('#ingredient_info_amount').closest('h4').removeClass('text-dark');
        $('#ingredient_info_amount').closest('h4').addClass('text-dark');
        ingredient_info_amount = true;
    }

    ingredient_info_calories = true;
    if (isNaN(parseFloat($('#ingredient_info_calories').val())) || $('#ingredient_info_calories').val() < 0) {
        $('#ingredient_info_calories').removeClass('is-invalid');
        $('#ingredient_info_calories').addClass('is-invalid');
        $('#ingredient_info_calories_error').removeClass('d-none');
        ingredient_info_calories = false;
    } else {
        $('#ingredient_info_calories').removeClass('is-invalid');
        $('#ingredient_info_calories_error').removeClass('d-none');
        $('#ingredient_info_calories_error').addClass('d-none');
        ingredient_info_calories = true;
    }

    ingredient_info_proteins = true;
    if (isNaN(parseFloat($('#ingredient_info_proteins').val())) || $('#ingredient_info_proteins').val() < 0) {
        $('#ingredient_info_proteins').removeClass('is-invalid');
        $('#ingredient_info_proteins').addClass('is-invalid');
        $('#ingredient_info_proteins_error').removeClass('d-none');
        ingredient_info_proteins = false;
    } else {
        $('#ingredient_info_proteins').removeClass('is-invalid');
        $('#ingredient_info_proteins_error').removeClass('d-none');
        $('#ingredient_info_proteins_error').addClass('d-none');
        ingredient_info_proteins = true;
    }

    ingredient_info_carbohydrates = true;
    if (isNaN(parseFloat($('#ingredient_info_carbohydrates').val())) || $('#ingredient_info_carbohydrates').val() < 0) {
        $('#ingredient_info_carbohydrates').removeClass('is-invalid');
        $('#ingredient_info_carbohydrates').addClass('is-invalid');
        $('#ingredient_info_carbohydrates_error').removeClass('d-none');
        ingredient_info_carbohydrates = false;
    } else {
        $('#ingredient_info_carbohydrates').removeClass('is-invalid');
        $('#ingredient_info_carbohydrates_error').removeClass('d-none');
        $('#ingredient_info_carbohydrates_error').addClass('d-none');
        ingredient_info_carbohydrates = true;
    }

    ingredient_info_fats = true;
    if (isNaN(parseFloat($('#ingredient_info_fats').val())) || $('#ingredient_info_fats').val() < 0) {
        $('#ingredient_info_fats').removeClass('is-invalid');
        $('#ingredient_info_fats').addClass('is-invalid');
        $('#ingredient_info_fats_error').removeClass('d-none');
        ingredient_info_fats = false;
    } else {
        $('#ingredient_info_fats').removeClass('is-invalid');
        $('#ingredient_info_fats_error').removeClass('d-none');
        $('#ingredient_info_fats_error').addClass('d-none');
        ingredient_info_fats = true;
    }


    return (ingredient_info_calories && ingredient_info_proteins && ingredient_info_carbohydrates && ingredient_info_fats && ingredient_info_name && ingredient_info_amount);
}

function validate_ingredient_selection() {

    ingredient_name = true;
    if ($.trim($('#ingredient_name').val()) == '') {
        $('#ingredient_name').removeClass('is-invalid');
        $('#ingredient_name').addClass('is-invalid');
        $('#ingredient_name_error').removeClass('d-none');
        ingredient_name = false;
    } else {
        $('#ingredient_name').removeClass('is-invalid');
        $('#ingredient_name_error').removeClass('d-none');
        $('#ingredient_name_error').addClass('d-none');
        ingredient_name = true;
    }

    ingredient_amount = true;
    if (isNaN(parseFloat($('#ingredient_amount').val())) || $('#ingredient_amount').val() < 0) {
        $('#ingredient_amount').removeClass('is-invalid');
        $('#ingredient_amount').addClass('is-invalid');
        $('#ingredient_amount_error').removeClass('d-none');
        ingredient_amount = false;
    } else {
        $('#ingredient_amount').removeClass('is-invalid');
        $('#ingredient_amount_error').removeClass('d-none');
        $('#ingredient_amount_error').addClass('d-none');
        xingredient_amount = true;

    }

    return (ingredient_amount && ingredient_name);

}

function clear_ingredient_selection() {
    $('#ingredient_name').val("");
    $('#ingredient_amount').val("0");
}

function clear_ingredient_information_fields() {
    $('#ingredient_info_name').text("No Ingredient Selected");
    $('#ingredient_info_amount').text("--");
    $('.ingredient_info').val("0");

    $('#ingredient_info_name').removeClass('text-danger');
    $('#ingredient_info_name').removeClass('text-dark');
    $('#ingredient_info_name').addClass('text-dark');

    $('#ingredient_info_amount').removeClass('text-danger');
    $('#ingredient_info_amount').removeClass('text-dark');
    $('#ingredient_info_amount').addClass('text-dark');
    $('#ingredient_info_amount').closest('h4').removeClass('text-danger');
    $('#ingredient_info_amount').closest('h4').removeClass('text-dark');
    $('#ingredient_info_amount').closest('h4').addClass('text-dark');
}

function insert_ingredient_information() {
    ingredient_name = $('#ingredient_name').val();
    ingredient_amount = $('#ingredient_amount').val();
    $('#ingredient_info_name').text(ingredient_name);
    $('#ingredient_info_amount').text(ingredient_amount);
}


$('#recipe_create_form').submit(function () {
    if ($("#recipe_final_info tr").length <= 0) {
        Swal.fire("Uh Oh!", "There is no ingredient Added!");
        return false;
    }
});

$(".ingredient_info_final").on("input", function() {

    calculate_total_values(); 

 });

function calculate_total_values()
{
    var amount_sum = 0 
    var calories_sum = 0 
    var proteins_sum = 0 
    var carbs_sum = 0 
    var  fats_sum = 0;
    $('.amount_field').each(function() {
        amount_sum += Number($(this).val());
    });
    $('.calories_field').each(function() {
        calories_sum += Number($(this).val());
    });
    $('.proteins_field').each(function() {
        proteins_sum += Number($(this).val());
    });
    $('.carbs_field').each(function() {
        carbs_sum += Number($(this).val());
    });
    $('.fats_field').each(function() {
        fats_sum += Number($(this).val());
    });

    $('#amount_total').text(amount_sum.toFixed(2))
    $('#calories_total').text(calories_sum.toFixed(2))
    $('#proteins_total').text(proteins_sum.toFixed(2))
    $('#carbs_total').text(carbs_sum.toFixed(2))
    $('#fats_total').text(fats_sum.toFixed(2))

}

function searchIngredient() {
    $('.spinner_over_screen').show();
    ingredient = $('#ingredient_name').val();
    ingredient_amount = $('#ingredient_amount').val()
    return $.ajax({
        url: "https://api.edamam.com/api/nutrition-data",
        type: "get", //send it through get method
        data: {
            ingr: `${ingredient_amount} g ${ingredient}`,
            app_id: '8cf36ad6',
            app_key: '0dbb5575fe976a1ecedaa15bb39f14fc'
        },

        async: true,
        crossDomain: true,
        success: function (response) {
            console.log(response);//Do Something
            if (response.calories) {

                $('#ingredient_info_calories').val(parseFloat(response.calories).toFixed(2));
                $('#ingredient_info_fats').val(parseFloat(response.totalNutrients.FAT.quantity).toFixed(2));
                $('#ingredient_info_proteins').val(parseFloat(response.totalNutrients.PROCNT.quantity).toFixed(2));
                $('#ingredient_info_carbohydrates').val(parseFloat(response.totalNutrients.CHOCDF.quantity).toFixed(2));
            }
        },
        complete: function () {
            $('.spinner_over_screen').hide();
        },
        error: function (xhr) {
            console.log(xhr);
            $('.spinner_over_screen').hide();
        }
    });

}
