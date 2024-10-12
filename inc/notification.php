<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
    #toast-container>.toast-success {
        background-color: #1e5631 !important;
        color: #fff !important;
        opacity: 1 !important;
    }

    #toast-container>.toast-error {
        background-color: #8b0000 !important;
        color: #fff !important;
        opacity: 1 !important;
    }

    #toast-container>div .toast-progress {
        background-color: #fff !important;
    }

    #toast-container>div .toast-title {
        color: #fff !important;
    }

    #toast-container>div .toast-message {
        color: #ddd !important;
    }

    #toast-container>div .toast-close-button {
        color: #fff !important;
    }
</style>

<script type="text/javascript">
    toastr.options = {
        "progressBar": true,
        "positionClass": "toast-top-right",
        "closeButton": true
    };

    <?php if (isset($_REQUEST['successMessage']) == true): ?>
        toastr.success('<?php echo $_REQUEST['successMessage']; ?>');
    <?php unset($_REQUEST['successMessage']);
    endif; ?>

    <?php if (isset($_REQUEST['errorMessage']) == true): ?>
        toastr.error('<?php echo $_REQUEST['errorMessage']; ?>');
    <?php unset($_REQUEST['errorMessage']);
    endif; ?>
</script>