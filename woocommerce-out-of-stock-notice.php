
/*
Show out of stock notices on simple and variable products. Ignores in stock.
*/
function out_of_stock_notice(){
	global $product; //Gets the global product
	$stockQty = 0; //initialises stock var
	if($product->is_type('simple')){ //if its a simple product
		$stockQty = $product->get_stock_quantity(); //get the simple product stock level
		if($stockQty == 0){
			echo "Out of Stock";
		}
	}
	else if($product->is_type('variable')){ //if it has variations
		$variations = $product->get_available_variations(); //get the variations in an array
    	foreach ( $variations as $key => $values ) { //for each available variation
			$variation = wc_get_product( $values['variation_id'] );
			$stockQty += $variation->get_stock_quantity(); //add stock quantity of variation onto the stockqty var
		}
		if($stockQty == 0){ //if no stock is available
			echo "Out of Stock"; //print out of stock
		}
		else{
			
		}
	}	
}