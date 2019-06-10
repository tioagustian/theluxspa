"use strict!"
$( document ).ready(function() {
    // variable
    var noofdays = 1; //  total no of days cookie will store
    var Navbarbg = "themelight1"; //  navbar color                themelight1 / theme1
    var headerbg = "themelight1"; //  header color                theme1 / theme2 / theme3 / theme4 / theme5 / theme6
    var logobg = "theme1"; //  Logo color                  theme1 / theme2 / theme3 / theme4 / theme5 / theme6
    var menucaption = "theme8"; //  menu caption color          theme1 / theme2 / theme3 / theme4 / theme5 / theme6 / theme7 / theme8 / theme9
    var bgpattern = "theme1"; //  background color            theme1 / theme2 / theme3 / theme4 / theme5 / theme6
    var activeitemtheme = "theme1"; //  menu active color           theme1 / theme2 / theme3 / theme4 / theme5 / theme6 / theme7 / theme8 / theme9 / theme10 / theme11 / theme12
    var frametype = "theme1"; //  preset frame color          theme1 / theme2 / theme3 / theme4 / theme5 / theme6
    var nav_image = "false"; //  navbar image bg             false / true
    var active_image = "img1"; //  avtive navbar image layout  img1 / img2 / img3 / img4 / img5 / img6
    var layout_type = "light"; //  theme layout color          dark / light
    var layout_width = "wide"; //  theme layout size           wide / box
    var menu_effect_desktop = "shrink"; //  navbar effect in desktop    shrink / overlay / push
    var menu_effect_tablet = "overlay"; //  navbar effect in tablet     shrink / overlay / push
    var menu_effect_phone = "overlay"; //  navbar effect in phone      shrink / overlay / push
    var menu_icon_style = "st2"; //  navbar menu icon            st1 / st2
	$('.pcoded-navbar .pcoded-hasmenu').attr('subitem-icon', 'style5');
	$( "#pcoded" ).pcodedmenu({
		themelayout: 'horizontal',
		horizontalMenuplacement: 'top',
		horizontalBrandItem: true,
		horizontalLeftNavItem: true,
		horizontalRightItem: true,
		horizontalSearchItem: true,
		horizontalMobileMenu: true,
		MenuTrigger: 'hover',
		SubMenuTrigger: 'hover',
		activeMenuClass: 'active',
		ThemeBackgroundPattern: bgpattern,
		HeaderBackground: headerbg,
        LHeaderBackground: menucaption,
        NavbarImage: nav_image,
        ActiveNavbarImage: active_image,
		NavbarBackground: Navbarbg,
		ActiveItemBackground: activeitemtheme,
		SubItemBackground: 'theme2',
		menutype: menu_icon_style,
        freamtype: frametype,
		layouttype: layout_type,
		ActiveItemStyle: 'style1',
		ItemBorder: true,
		ItemBorderStyle: 'none',
		SubItemBorder: true,
		DropDownIconStyle: 'style1',
		FixedNavbarPosition: false,
		FixedHeaderPosition: false,
		horizontalNavIsCentered: false,
		horizontalstickynavigation: false,
		horizontalNavigationMenuIcon: true,
	});
});
