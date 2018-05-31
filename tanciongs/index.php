<!doctype html>
<html>
<head>

<style>

.custom-select {
  position: relative;
  font-family: Arial;
}
.custom-select select {
  display: none; /*hide original SELECT element:*/
}
.select-selected {
  background-color: white;
}
/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: gray transparent transparent transparent;
}
/*mag atubang ang arrow upwards if i-open ang select box (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent gray transparent;
  top: 7px;
}
/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: gray;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}
/*style items (options):*/
.select-items {
  position: absolute;
  background-color: orange;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}
/*mu hide ni sa items when the select box is closed:*/
.select-hide {
  display: none;
}
.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
</head>
	<body>
		<center><div class="container">
			<div class="wrapper">
				<img src="resource/img/png.png" width ="350px" height="350px">
			</div>
				<div class="custom-select" style="width:200px;">
  					<select>
   						 <option value="0">Select Report</option>
   						 <option value="1">Product Master List</option>
    					 <option value="2">Stock Status</option>
    					 <option value="3">Price List</option>
    					 <option value="4">Product Movement</option>
   						 <option value="5">Inventory Transaction</option>
   						 <option value="6">Product Performance</option>
   						 <option value="7">Sales By Product</option>
   						 <option value="8">Sales By Clerk</option>
   						 <option value="9">Tender Report</option>
   						 <option value="10">Sales Status</option>
   						 
 					 </select>
				
				
			
			</div>

<script>
var x, i, j, selElmnt, a, b, c;

x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, mu create ni siyag new DIV nga mu act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, mu create ni siyag new DIV nga mu contain sa option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /*for each option sa original select element,
    mu create ni siyag new DIV nga muact as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*kung naa na ganiy gi click from the menu, mu update ni siya sa original ug sa selected:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*if clicked na gani ang select box kay i close napud niya ang dropdown menu nya iopen ang selected na box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*function ni siya nga mu close sa dropdown menu except sa napilian sa menu:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*kung mu click ang user gawas sa drowpdown menu kay mu close ang dropdown menu:*/
document.addEventListener("click", closeAllSelect);</script>

<input type="submit" name="submit", class="submit", value="submit">

		</div>	</center>
	</body>	
</html>