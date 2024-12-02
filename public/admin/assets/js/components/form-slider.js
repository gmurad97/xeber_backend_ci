var sliderColorScheme=document.querySelectorAll("#rangeslider_basic");sliderColorScheme&&sliderColorScheme.forEach(function(e){noUiSlider.create(e,{start:127,connect:"lower",range:{min:0,max:255}})});var rangesliderVertical=document.querySelectorAll("#rangeslider_vertical");rangesliderVertical&&rangesliderVertical.forEach(function(e){noUiSlider.create(e,{start:[60,160],connect:!0,orientation:"vertical",range:{min:0,max:200}})});var multielementslider=document.querySelectorAll("#rangeslider_multielement");multielementslider&&multielementslider.forEach(function(e){noUiSlider.create(e,{start:[20,80],connect:!0,range:{min:0,max:100}})});var resultElement=document.getElementById("result"),sliders=document.getElementsByClassName("sliders"),colors=[0,0,0];sliders&&[].slice.call(sliders).forEach(function(n,i){noUiSlider.create(n,{start:127,connect:[!0,!1],orientation:"vertical",range:{min:0,max:255},format:wNumb({decimals:0})}),n.noUiSlider.on("update",function(){colors[i]=n.noUiSlider.get();var e="rgb("+colors.join(",")+")";resultElement.style.background=e,resultElement.style.color=e})});var nonLinearSlider=document.getElementById("nonlinear");nonLinearSlider&&noUiSlider.create(nonLinearSlider,{connect:!0,behaviour:"tap",start:[500,4e3],range:{min:[0],"10%":[500,500],"50%":[4e3,1e3],max:[1e4]}});var nodes=[document.getElementById("lower-value"),document.getElementById("upper-value")];nonLinearSlider.noUiSlider.on("update",function(e,n,i,t,r){nodes[n].innerHTML=e[n]+", "+r[n].toFixed(2)+"%"});var lockedState=!1,lockedSlider=!1,lockedValues=[60,80],slider1=document.getElementById("slider1"),slider2=document.getElementById("slider2"),lockButton=document.getElementById("lockbutton"),slider1Value=document.getElementById("slider1-span"),slider2Value=document.getElementById("slider2-span");function crossUpdate(e,n){var i;lockedState&&(e-=lockedValues[(i=slider1===n?0:1)?0:1]-lockedValues[i],n.noUiSlider.set(e))}function setLockedValues(){lockedValues=[Number(slider1.noUiSlider.get()),Number(slider2.noUiSlider.get())]}lockButton&&lockButton.addEventListener("click",function(){lockedState=!lockedState,this.textContent=lockedState?"unlock":"lock"}),noUiSlider.create(slider1,{start:60,animate:!1,range:{min:50,max:100}}),noUiSlider.create(slider2,{start:80,animate:!1,range:{min:50,max:100}}),slider1&&slider2&&(slider1.noUiSlider.on("update",function(e,n){slider1Value.innerHTML=e[n]}),slider2.noUiSlider.on("update",function(e,n){slider2Value.innerHTML=e[n]}),slider1.noUiSlider.on("change",setLockedValues),slider2.noUiSlider.on("change",setLockedValues),slider1.noUiSlider.on("slide",function(e,n){crossUpdate(e[n],slider2)}),slider2.noUiSlider.on("slide",function(e,n){crossUpdate(e[n],slider1)}));var mergingTooltipSlider=document.getElementById("slider-merging-tooltips");function mergeTooltips(e,c,u){var m="rtl"===getComputedStyle(e).direction,S="rtl"===e.noUiSlider.options.direction,g="vertical"===e.noUiSlider.options.orientation,f=e.noUiSlider.getTooltips(),i=e.noUiSlider.getOrigins();f.forEach(function(e,n){e&&i[n].appendChild(e)}),e&&e.noUiSlider.on("update",function(e,n,i,t,r){var l=[[]],a=[[]],s=[[]],o=0;f[0]&&(l[0][0]=0,a[0][0]=r[0],s[0][0]=e[0]);for(var d=1;d<r.length;d++)(!f[d]||r[d]-r[d-1]>c)&&(l[++o]=[],s[o]=[],a[o]=[]),f[d]&&(l[o].push(d),s[o].push(e[d]),a[o].push(r[d]));l.forEach(function(e,n){for(var i=e.length,t=0;t<i;t++){var r,l,o,d=e[t];t===i-1?(o=0,a[n].forEach(function(e){o+=1e3-e}),r=g?"bottom":"right",l=1e3-a[n][S?0:i-1],o=(m&&!g?100:0)+o/i-l,f[d].innerHTML=s[n].join(u),f[d].style.display="block",f[d].style[r]=o+"%"):f[d].style.display="none"}})})}mergingTooltipSlider&&(noUiSlider.create(mergingTooltipSlider,{start:[20,75],connect:!0,tooltips:[!0,!0],range:{min:0,max:100}}),mergeTooltips(mergingTooltipSlider,5," - "));var softSlider=document.getElementById("soft");softSlider&&(noUiSlider.create(softSlider,{start:50,range:{min:0,max:100},pips:{mode:"values",values:[20,80],density:4}}),softSlider.noUiSlider.on("change",function(e,n){e[n]<20?softSlider.noUiSlider.set(20):80<e[n]&&softSlider.noUiSlider.set(80)}));