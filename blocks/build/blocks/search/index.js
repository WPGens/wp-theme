(()=>{"use strict";const e=window.wp.blocks,t=window.React,l=window.wp.i18n,a=window.wp.blockEditor,s=window.wp.components,c=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"wpgens-blocks/search","version":"0.1.0","title":"Event Search","category":"wpgens","icon":"search","description":"Add an event search bar with date, type, and optional city filters.","example":{},"supports":{"html":false},"attributes":{"showCity":{"type":"boolean","default":true}},"textdomain":"wpgens-blocks","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css"}');(0,e.registerBlockType)(c.name,{...c,edit:function({attributes:e,setAttributes:c}){const{showCity:n}=e,r=(0,a.useBlockProps)();return(0,t.createElement)("div",{...r},(0,t.createElement)(a.InspectorControls,null,(0,t.createElement)(s.PanelBody,{title:(0,l.__)("Search Settings","wpgens-blocks")},(0,t.createElement)(s.ToggleControl,{label:(0,l.__)("Show City Filter","wpgens-blocks"),checked:n,onChange:()=>c({showCity:!n})}))),(0,t.createElement)("div",{className:"search-bar max-w-screen-xl px-8 lg:px-0 w-full m-auto -mt-12 relative"},(0,t.createElement)("div",{className:"bg-[#0C1015] pt-5 pb-0 pl-6 pr-6 lg:pr-0"},(0,t.createElement)("div",{className:`grid grid-cols-1 lg:grid-cols-${n?"5":"4"} gap-6`},(0,t.createElement)("div",{className:"flex flex-col"},(0,t.createElement)("label",{htmlFor:"start_date",className:"text-[#969696] uppercase pb-1 text-xs font-medium"},"From"),(0,t.createElement)("input",{type:"date",id:"start_date",className:"block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light"})),(0,t.createElement)("div",{className:"flex flex-col with-border"},(0,t.createElement)("label",{htmlFor:"end_date",className:"text-[#969696] uppercase pb-1 text-xs font-medium"},"To"),(0,t.createElement)("input",{type:"date",id:"end_date",className:"block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light"})),(0,t.createElement)("div",{className:"flex flex-col with-border"},(0,t.createElement)("label",{htmlFor:"event_type",className:"text-[#969696] uppercase pb-1 text-xs font-medium"},"Category"),(0,t.createElement)("select",{id:"event_type",className:"block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light -ml-1"},(0,t.createElement)("option",{value:""},"Event Type"))),n&&(0,t.createElement)("div",{className:"flex flex-col with-border"},(0,t.createElement)("label",{htmlFor:"city",className:"text-[#969696] uppercase pb-1 text-xs font-medium"},"City"),(0,t.createElement)("select",{id:"city",className:"block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light -ml-1"},(0,t.createElement)("option",{value:""},"All"))),(0,t.createElement)("div",{className:"block -mt-5"},(0,t.createElement)("button",{type:"button",className:"bg-primary text-center text-black w-full font-semibold uppercase text-[17px] tracking-[1px] h-16 my-6 lg:my-0 lg:h-20 hover:bg-black hover:text-primary"},"Search"))))))},save:function({attributes:e}){const l=a.useBlockProps.save();return(0,t.createElement)("div",{...l})}})})();