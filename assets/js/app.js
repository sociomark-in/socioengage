$(function () {
	$(".sidebar-toggler").on("click", () => {
		$("body").toggleClass("sidebar-folded");
		if ($(".sidebar-toggler").hasClass("active")) {
			$(".sidebar-toggler").removeClass("active");
			$(".sidebar-toggler").addClass("not-active");
		} else {
			$(".sidebar-toggler").addClass("active");
			$(".sidebar-toggler").removeClass("not-active");
			
			$(".sidebar-body").on("mouseenter", ()=>{
				$("body").addClass("open-sidebar-folded overflow-hidden");
			})
			$(".sidebar-body").on("mouseleave", ()=>{
				$("body").removeClass("open-sidebar-folded overflow-hidden");
			})
		}
	});

});
