/*
  Highcharts JS v7.0.2 (2019-01-17)

 Indicator series type for Highstock

 (c) 2010-2019 Wojciech Chmiel

 License: www.highcharts.com/license
*/
(function(k){"object"===typeof module&&module.exports?(k["default"]=k,module.exports=k):"function"===typeof define&&define.amd?define(function(){return k}):k("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(k){(function(k){function u(c,d,g){return{index:d,close:c.yData[d][g],x:c.xData[d]}}var B=k.seriesTypes.atr,z=k.seriesTypes.sma,C=k.isArray,y=k.merge,A=k.correctFloat;k.seriesType("supertrend","sma",{params:{multiplier:3,period:10},risingTrendColor:"#06B535",fallingTrendColor:"#F21313",
changeTrendLine:{styles:{lineWidth:1,lineColor:"#333333",dashStyle:"LongDash"}}},{nameBase:"Supertrend",nameComponents:["multiplier","period"],requiredIndicators:["atr"],init:function(){var c;z.prototype.init.apply(this,arguments);c=this.options;c.cropThreshold=this.linkedParent.options.cropThreshold-(c.params.period-1)},drawGraph:function(){for(var c=this,d=c.options,g=c.linkedParent,x=g?g.points:[],t=c.points,D=c.graph,p=t.length,q=x.length-p,q=0<q?q:0,w={options:{gapSize:d.gapSize}},m={top:[],
bottom:[],intersect:[]},v={top:{styles:{lineWidth:d.lineWidth,lineColor:d.fallingTrendColor,dashStyle:d.dashStyle}},bottom:{styles:{lineWidth:d.lineWidth,lineColor:d.risingTrendColor,dashStyle:d.dashStyle}},intersect:d.changeTrendLine},e,n,b,f,h,r,l,a;p--;)e=t[p],n=t[p-1],b=x[p-1+q],f=x[p-2+q],h=x[p+q],r=x[p+q+1],l=e.options.color,a={x:e.x,plotX:e.plotX,plotY:e.plotY,isNull:!1},!f&&b&&g.yData[b.index-1]&&(f=u(g,b.index-1,3)),!r&&h&&g.yData[h.index+1]&&(r=u(g,h.index+1,3)),!b&&f&&g.yData[f.index+1]?
b=u(g,f.index+1,3):!b&&h&&g.yData[h.index-1]&&(b=u(g,h.index-1,3)),e&&b&&h&&f&&e.x!==b.x&&(e.x===h.x?(f=b,b=h):e.x===f.x?(b=f,f={close:g.yData[b.index-1][3],x:g.xData[b.index-1]}):r&&e.x===r.x&&(b=r,f=h)),n&&f&&b?(h={x:n.x,plotX:n.plotX,plotY:n.plotY,isNull:!1},e.y>=b.close&&n.y>=f.close?(e.color=l||d.fallingTrendColor,m.top.push(a)):e.y<b.close&&n.y<f.close?(e.color=l||d.risingTrendColor,m.bottom.push(a)):(m.intersect.push(a),m.intersect.push(h),m.intersect.push(y(h,{isNull:!0})),e.y>=b.close&&n.y<
f.close?(e.color=l||d.fallingTrendColor,n.color=l||d.risingTrendColor,m.top.push(a),m.top.push(y(h,{isNull:!0}))):e.y<b.close&&n.y>=f.close&&(e.color=l||d.risingTrendColor,n.color=l||d.fallingTrendColor,m.bottom.push(a),m.bottom.push(y(h,{isNull:!0}))))):b&&(e.y>=b.close?(e.color=l||d.fallingTrendColor,m.top.push(a)):(e.color=l||d.risingTrendColor,m.bottom.push(a)));k.objectEach(m,function(b,a){c.points=b;c.options=y(v[a].styles,w);c.graph=c["graph"+a+"Line"];z.prototype.drawGraph.call(c);c["graph"+
a+"Line"]=c.graph});c.points=t;c.options=d;c.graph=D},getValues:function(c,d){var g=d.period;d=d.multiplier;var k=c.xData,t=c.yData,u=[],p=[],q=[],w=0===g?0:g-1,m,v=[],e=[],n,b,f,h,r,l,a;if(k.length<=g||!C(t[0])||4!==t[0].length||0>g)return!1;c=B.prototype.getValues.call(this,c,{period:g}).yData;for(a=0;a<c.length;a++){l=t[w+a];r=t[w+a-1]||[];b=v[a-1];f=e[a-1];h=q[a-1];0===a&&(b=f=h=0);g=A((l[1]+l[2])/2+d*c[a]);m=A((l[1]+l[2])/2-d*c[a]);v[a]=g<b||r[3]>b?g:b;e[a]=m>f||r[3]<f?m:f;if(h===b&&l[3]<v[a]||
h===f&&l[3]<e[a])n=v[a];else if(h===b&&l[3]>v[a]||h===f&&l[3]>e[a])n=e[a];u.push([k[w+a],n]);p.push(k[w+a]);q.push(n)}return{values:u,xData:p,yData:q}}})})(k)});
//# sourceMappingURL=supertrend.js.map