<form id="addform">
    <div class="row">
        <div class="col-md-12">
            <div class="purchasegrp">
                <label class="purchaseinfo"><span class="aster">* </span>Name</label>
                <input type="text" class="form-control purchaseselects" name="name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="purchasegrp">
                <label class="purchaseinfo">Mobile Number</label>
                <input type="number" class="form-control purchaseselects" name="mobile_number">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="purchasegrp">
                <label class="purchaseinfo">Email</label>
                <input type="text" class="form-control purchaseselects" name="email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 blkftr">
            <div class="modal-footer taskfooter">
                <button type="submit" class="tasksave1">
                    SAVE
                </button>
            </div>
        </div>
    </div>
</form>
<script>
    $('#addform').formValidation({
        framework: 'bootstrap',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Enter Name'
                    },
                },
            },
        },
    })
        .on('success.form.fv', function (e) {
            // Prevent form submission
            e.preventDefault();
            var form = document.querySelector('#addform');
            var dataForm = new FormData(form);
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>Home/addData',
                data: dataForm,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    if (result['succeed'] == true) {
                        $('#modal_md').modal('hide');
                        alert('Saved successfully');
                        getData();
                    } else {
                        alert('Already exist');
                    }
                },
                error: function (xhr, status, error) {
                    alert('Error occurred while saving data: ' + error);
                   
                }
            });
        });

</script>