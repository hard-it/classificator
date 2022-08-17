<?
$arBrandsList = array();
$arBrandsSymbol = array();
if(!empty($arResult["ITEMS"])){
    foreach($arResult["ITEMS"] as $item){
        /* Получаем список букв для фильрации */
        $symbol = mb_substr($item["NAME"], 0, 1, 'utf-8');
        $arBrandsSymbol[] = array(
            "NAME" => $symbol,
            "CODE" => ord($symbol)
        );
        /* Получаем список элементов */
        $arBrandsList[] = array(
            'ID'   => $item["ID"],
            'EDIT_LINK'   => $item["EDIT_LINK"],
            'DELETE_LINK'   => $item["DELETE_LINK"],
            'IBLOCK_ID'    =>  $item["IBLOCK_ID"],
            'NAME' => $item["NAME"],
            'LOGO'   => $item["PREVIEW_PICTURE"]["SRC"],
            'URL'  => $item["DETAIL_PAGE_URL"],
            'SYMBOL'  => ord($symbol)
        );
    }
}
$arBrandsSymbolUnique = array_unique($arBrandsSymbol, SORT_REGULAR);
usort($arBrandsSymbolUnique, function($a, $b) { return $a["NAME"] <=> $b["NAME"]; });
$arResult["SYMBOLS"] = $arBrandsSymbolUnique;
$arResult["ELEMENTS"] = $arBrandsList;
