<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<pre><?//print_r($arResult)?></pre>
<div class="rew-footer-carousel">		
<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="item">
		<div class="side-block side-opin">
			<div class="inner-block">
				<div class="title">
					<div class="photo-block">
	<?	
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>	
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						border="0"						
						<?if($arItem["PREVIEW_PICTURE"]["WIDTH"]>49 ||
							 $arItem["PREVIEW_PICTURE"]["HEIGHT"]>49):?>
						<?
						$arItem["PREVIEW_PICTURE"] = CFile::ResizeImageGet(
							$arItem["PREVIEW_PICTURE"],
							array("width" => 49, "height" => 49),
							BX_RESIZE_IMAGE_PROPORTIONAL,
							true
							);
						?>
						<?endif;?>
						src="<?=$arItem["PREVIEW_PICTURE"]["src"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["width"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["height"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/>
				</a>
			<?else:?>
				<img
					border="0"
					<?if($arItem["PREVIEW_PICTURE"]["WIDTH"]>49 ||
							 $arItem["PREVIEW_PICTURE"]["HEIGHT"]>49):?>
						<?
						$arItem["PREVIEW_PICTURE"] = CFile::ResizeImageGet(
							$arItem["PREVIEW_PICTURE"],
							array("width" => 49, "height" => 49),
							BX_RESIZE_IMAGE_PROPORTIONAL,
							true
							);
						?>
					<?endif;?>
					src="<?=$arItem["PREVIEW_PICTURE"]["src"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["width"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["height"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					style="float:left"
					/>
			<?endif?>
			<?else:?>
							<img
							border="0"
							src="<?=SITE_TEMPLATE_PATH?>/img/no_photo_left_block.jpg "
							/>
		<?endif?>
					</div>
					<div class="name-block">
					<?echo $arItem["NAME"]?>	
					</div>
					<div class="pos-block">
						<?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?>, 
						"<?=$arItem["PROPERTIES"]["COMPANY"]["VALUE"]?>"
					</div>
				</div>
					<div class="text-block">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</div>	
			</div>
		</div>
	</div>
<?endforeach;?>
</div>

