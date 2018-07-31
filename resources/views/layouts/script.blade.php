<script src="https://blackrockdigital.github.io/startbootstrap-agency/js/jqBootstrapValidation.js"></script>
<script src="https://blackrockdigital.github.io/startbootstrap-agency/js/agency.min.js"></script>
{{-- session fade out --}}
<script type="text/javascript">
    window.setTimeout(function() {
        $(".session").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
</script>