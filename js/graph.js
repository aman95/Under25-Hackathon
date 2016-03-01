//var data = [
//	{key: "Glazed",		value: 132},
//	{key: "Jelly",		value: 71},
//	{key: "Holes",		value: 337},
//	{key: "Sprinkles",	value: 93},
//	{key: "Crumb",		value: 78},
//	{key: "Chocolate",	value: 43},
//	{key: "Coconut", 	value: 20},
//	{key: "Cream",		value: 16},
//	{key: "Cruller", 	value: 30},
//	{key: "Éclair", 	value: 8},
//	{key: "Fritter", 	value: 17},
//	{key: "Bearclaw", 	value: 21}
//];
function barBasic(){

	w = 850;
	h = 550;
	margin = {
		top: 100,
		bottom: 100,
		left: 80,
		right: 40
	};	
	width = w - margin.left - margin.right;
	height = h - margin.top - margin.bottom;

}

function barAxis(){

	x = d3.scale.ordinal()
			.domain(data.map(function(entry){
				return entry.key;
			}))
			.rangeBands([0, width]);
	y = d3.scale.linear()
			.domain([0, d3.max(data, function(d){
				return d.value;
			})])
			.range([height, 0]);
}

function barOColor(){
ordinalColorScale = d3.scale.category20();
}

function barLColor(){

}

function barAxisValues(){
	xAxis = d3.svg.axis()
			.scale(x)
			.orient("bottom");
	yAxis = d3.svg.axis()
			.scale(y)
			.orient("left");
}

function barGridlines(){
	yGridlines = d3.svg.axis()
				.scale(y)
				.tickSize(-width,0,0)
				.tickFormat("")
				.orient("left");
	chart.append("g")
		.call(yGridlines)
		.classed("gridline", true)
		.attr("transform", "translate(0,0)")
}

function barDiv(){
	
	svg = d3.select("#generated").append("svg")
			.attr("id", "chart")
			.attr("width", w)
			.attr("height", h);
	chart = svg.append("g")
			.classed("display", true)
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
}

function barPopulate(){
	chart.selectAll(".bar")
		.data(data)
		.enter()
			.append("rect")
			.classed("bar", true)
			.attr("x", function(d,i){
				return x(d.key);
			})
			.attr("y", function(d,i){
				return y(d.value);
			})
			.attr("height", function(d,i){
				return height - y(d.value);
			})
			.attr("width", function(d){
				return x.rangeBand();
			})
			.style("fill", function(d,i){
				return ordinalColorScale(i);
			});
}

function barLabels(){
	chart.selectAll(".bar-label")
		.data(data)
		.enter()
			.append("text")
			.classed("bar-label", true)
			.attr("x", function(d,i){
				return x(d.key) + (x.rangeBand()/2)
			})
			.attr("dx", 0)
			.attr("y", function(d,i){
				return y(d.value);
			})
			.attr("dy", -6)
			.text(function(d){
				return d.value;
			})
}

function barAxisPopulate(){
	chart.append("g")
		.classed("x axis", true)
		.attr("transform", "translate(" + 0 + "," + height + ")")
		.call(xAxis)
			.selectAll("text")
				.style("text-anchor", "end")
				.attr("dx", -8)
				.attr("dy", 8)
				.attr("transform", "translate(0,0) rotate(-45)");

	chart.append("g")
		.classed("y axis", true)
		.attr("transform", "translate(0,0)")
		.call(yAxis);
}

function barLabel(){
	chart.select(".y.axis")
		.append("text")
		.attr("x", 0)
		.attr("y", 0)
		.style("text-anchor", "middle")
		.attr("transform", "translate(-50," + height/2 + ") rotate(-90)")
		.text(y_axis_label);

	chart.select(".x.axis")
		.append("text")
		.attr("x", 0)
		.attr("y", 0)
		.style("text-anchor", "middle")
		.attr("transform", "translate(" + width/2 + ",80)")
		.text(x_axis_label);
}

function barEvent(){
	chart.selectAll(".bar")
			.on("mouseover", function(d,i){
				d3.select(this).style("fill",bar_color);
				tooltip.style("visibility", "visible");
				tooltip.text(d.value);
				tooltip.classed("tooltip",true);
			})
			// .on("mouseover",function(d,i){
				
			// })
			// .on("mousemove",function(d,i){
			// 	// d3.select(this).style("fill","green");
			// })
			// .on("mouseout",function(d,i){
			// 	d3.select(this).style("fill",ordinalColorScale(i));
			// });
.on("mousemove", function(){return tooltip.style("top", (event.pageY-10)+"px").style("left",(event.pageX+10)+"px");})
	.on("mouseout", function(d,i){
		d3.select(this).style("fill",ordinalColorScale(i));
		tooltip.style("visibility", "hidden");
	});
}

function barTitle(){
svg.append("text")
        .attr("x", (eval(title_sub_loc[1])))             
        .attr("y", 0 + (margin.top / 3))
        .attr("text-anchor","middle")
        .style("font-size", "20px")
        .style("fill",title_color)
        .text(title_text);

svg.append("text")
        .attr("x", (eval(title_sub_loc[1])))             
        .attr("y", 20 + (margin.top / 3)) 
        .attr("text-anchor","middle")
        .style("font-size", "12px")
        .style("fill",title_sub_color) 
        .text(title_sub);
}


function barTooltip(){
	tooltip = d3.select("body")
	.append("div")
	.style("position", "absolute")
	.style("z-index", "10")
	.style("visibility", "hidden")
	.text("");
}
//bar_color = "#00000000";
//x_axis_label= "Donut Type";
//y_axis_label = "Units Sold";
//title_text = "Value vs Quantity";
//title_loc = [0,"width/2","width-margin.left"];
//title_sub_loc = [0,"width/2","width-margin.left"];
//title_color = "black";
//title_sub_color = "grey";
//title_sub = " helo asdasaskd aksdkashdlasdc ajs dacs";
barBasic();
barAxis();
barDiv();
barOColor();
barAxisValues();
barGridlines();
barPopulate();
barLabels();
barAxisPopulate();
barLabel();
barEvent();
barTitle();
barTooltip();