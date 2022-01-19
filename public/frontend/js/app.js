// let _ = function(selector) {
//     return document.querySelector(selector);
// }
// let _all = function(selector) {
//     let el = document.querySelectorAll(selector);
//     return Object.values(el);
// }
// let search_input = _('.search_input');
// let search       = _('.search');
// let search_reault = _('.search_reault');
// let search_show_sm = _('.search_show_sm');
// search_show_sm.addEventListener('click', function() {
//     search.classList.toggle('search_sm');
// });
// window.addEventListener('click', function(e) {
//     if (e.target.offsetParent) {
//         let parent_match = e.target.offsetParent.parentElement.classList.contains('search');
    
//         let target_is_input = e.target.classList.contains('search_input');
//         if (parent_match || target_is_input) {
//             let val = search_input.value;
//             if (val) {
//                 search.classList.add('active');
//                 if (window.innerWidth <= 768) {
//                     search.classList.add('search_sm');
//                 }
//             }
//         } else {
//             search.classList.remove('active');
//             if (window.innerWidth <= 768) {
//                 search.classList.add('search_sm');
//             }
//         }
//     }
// });
// search_input.addEventListener('input', function() {
//     let val = this.value;
//     if (val) {
//         search.classList.add('active');
//         if (window.innerWidth <= 768) {
//             search.classList.add('search_sm');
//         }
//     } else {
//         search.classList.remove('active');
//     }
// });

// // Expandable tabs

// var expandable = _all('.expandable');
// if (expandable.length > 0) {
//     expandable.map(elem => {
//         let getHead = elem.querySelector('.head');
//         if (getHead) {
//             getHead.addEventListener('click', function(e) {
//                 elem.classList.toggle('active');
//             });
//         }
//     });
// }

// Range slider control 
// let slider 
// slider_left
// slider_right

/* dropdown start-----------------*/
var drop_container = document.querySelectorAll('.drop_container');
var drop = document.querySelectorAll('.drop_container .drop');
for (var i = 0; i < drop.length; i++) {
	
	drop[i].addEventListener('click', function(){
		if (this.parentElement.classList.contains('active') == true) {
			this.parentElement.classList.remove('active');
		} 
		else{
			for (var i = 0; i < drop_container.length; i++) {
				drop_container[i].classList.remove('active');
			}
			this.parentElement.classList.add('active');
		}
	});
}
window.addEventListener('click', function(event){
	if (!event.target.matches('.drop')) {
		for(var i = 0; i < drop_container.length; i++){
			var rmv = drop_container[i];
			if (rmv.classList.contains('active')) {
		        rmv.classList.remove('active');
		      }
		    drop_container[i].classList.remove('active');
		}
	}
});
/* dropdown end-----------------*/


