let o=document.querySelectorAll(".anim_items");if(o.length>0){let i=function(c){for(let e=0;e<o.length;e++){const t=o[e],n=t.offsetHeight,s=l(t).top,m=4;let r=window.innerHeight-n/m;n>window.innerHeight&&(r=window.innerHeight-window.innerHeight/m),scrollY>s-r&&scrollY<s+n?t.classList.add("activee"):t.classList.remove("activee")}},l=function(c){const e=c.getBoundingClientRect(),t=window.pageXOffset||document.documentElement.scrollLeft,n=window.scrollY||document.documentElement.scrollTop;return{top:e.top+n,left:e.left+t}};var d=i,a=l;window.addEventListener("scroll",i),i()}