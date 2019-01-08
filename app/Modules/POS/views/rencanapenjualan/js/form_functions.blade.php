<script>
	function count_total() {
		var grandtotal = 0;
		var spdt_qty = $('[name="spdt_qty[]"]');
		if(spdt_qty.length > 0 ) {
			for(x = 0;x < spdt_qty.length;x++) {
				unit_qty = $( spdt_qty[x] ).val();
				unit_qty = unit_qty != '' ? parseInt(unit_qty) : 0;
				grandtotal += unit_qty;
			}
		}

		$('#grandtotal').val(
			get_currency(grandtotal)
		);
	}
</script>