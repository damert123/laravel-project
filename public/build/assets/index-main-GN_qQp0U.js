const o=document.querySelector(".slider-container");var t=document.querySelectorAll(".slider-single"),r=t.length-1,c=-1;function L(){const e=document.createElement("div");e.classList.add("bullet-container"),t.forEach((i,a)=>{const l=document.createElement("div");l.classList.add("bullet"),l.id=`bullet-index-${a}`,l.addEventListener("click",()=>{f(a)}),e.appendChild(l),i.classList.add("proactivede")}),o.appendChild(e)}function m(){const e=document.createElement("a"),i=document.createElement("i");i.classList.add("fa"),i.classList.add("fa-arrow-left"),e.classList.add("slider-left"),e.appendChild(i),e.addEventListener("click",()=>{n()});const a=document.createElement("a"),l=document.createElement("i");l.classList.add("fa"),l.classList.add("fa-arrow-right"),a.classList.add("slider-right"),a.appendChild(l),a.addEventListener("click",()=>{v()}),o.appendChild(e),o.appendChild(a)}function p(){L(),m(),setTimeout(function(){v()},500)}function d(){document.querySelector(".bullet-container").querySelectorAll(".bullet").forEach((e,i)=>{e.classList.remove("active"),i===c&&e.classList.add("active")}),u()}function u(){c===t.length-1?(t[0].classList.add("not-visible"),t[t.length-1].classList.remove("not-visible"),document.querySelector(".slider-right").classList.add("not-visible"),document.querySelector(".slider-left").classList.remove("not-visible")):c===0?(t[t.length-1].classList.add("not-visible"),t[0].classList.remove("not-visible"),document.querySelector(".slider-left").classList.add("not-visible"),document.querySelector(".slider-right").classList.remove("not-visible")):(t[t.length-1].classList.remove("not-visible"),t[0].classList.remove("not-visible"),document.querySelector(".slider-left").classList.remove("not-visible"),document.querySelector(".slider-right").classList.remove("not-visible"))}function v(){if(c<r?c++:c=0,c>0)var e=t[c-1];else var e=t[r];var i=t[c];if(c<r)var a=t[c+1];else var a=t[0];t.forEach(l=>{var s=l;s.classList.contains("preactivede")&&(s.classList.remove("preactivede"),s.classList.remove("preactive"),s.classList.remove("active"),s.classList.remove("proactive"),s.classList.add("proactivede")),s.classList.contains("preactive")&&(s.classList.remove("preactive"),s.classList.remove("active"),s.classList.remove("proactive"),s.classList.remove("proactivede"),s.classList.add("preactivede"))}),e.classList.remove("preactivede"),e.classList.remove("active"),e.classList.remove("proactive"),e.classList.remove("proactivede"),e.classList.add("preactive"),i.classList.remove("preactivede"),i.classList.remove("preactive"),i.classList.remove("proactive"),i.classList.remove("proactivede"),i.classList.add("active"),a.classList.remove("preactivede"),a.classList.remove("preactive"),a.classList.remove("active"),a.classList.remove("proactivede"),a.classList.add("proactive"),d()}function n(){if(c>0?c--:c=r,c<r)var e=t[c+1];else var e=t[0];var i=t[c];if(c>0)var a=t[c-1];else var a=t[r];t.forEach(l=>{var s=l;s.classList.contains("proactive")&&(s.classList.remove("preactivede"),s.classList.remove("preactive"),s.classList.remove("active"),s.classList.remove("proactive"),s.classList.add("proactivede")),s.classList.contains("proactivede")&&(s.classList.remove("preactive"),s.classList.remove("active"),s.classList.remove("proactive"),s.classList.remove("proactivede"),s.classList.add("preactivede"))}),a.classList.remove("preactivede"),a.classList.remove("active"),a.classList.remove("proactive"),a.classList.remove("proactivede"),a.classList.add("preactive"),i.classList.remove("preactivede"),i.classList.remove("preactive"),i.classList.remove("proactive"),i.classList.remove("proactivede"),i.classList.add("active"),e.classList.remove("preactivede"),e.classList.remove("preactive"),e.classList.remove("active"),e.classList.remove("proactivede"),e.classList.add("proactive"),d()}function f(e){const i=c>e?()=>v():()=>n();for(;c!==e;)i()}p();