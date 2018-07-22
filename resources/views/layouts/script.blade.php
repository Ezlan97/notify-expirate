<script src="{{ asset('js/app.js') }}"></script>
{{-- session fade out --}}
<script type="text/javascript">
    window.setTimeout(function() {
        $(".session").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
</script>