jQuery,document.addEventListener("DOMContentLoaded",(function(){const t=document.querySelectorAll(".contact-widget-item"),c=document.getElementById("contactButton_2356213"),e=document.getElementById("contactWidgetContainer_2356213"),o=document.getElementById("contactWidgetcontactIcon_2356213"),s=document.getElementById("contactWidgetXIcon_2356213"),n=document.getElementById("contactWidgetCtaContainer_2356213"),a=document.getElementById("contactWidgetCTA_2356213"),d=document.getElementById("contactWidgetCtaClosing_2356213"),i=sessionStorage.getItem("clicked");c&&("contactCta"==i||n.classList.add("CTA_show"),d.addEventListener("click",(function(){n.classList.remove("CTA_show"),sessionStorage.setItem("clicked","contactCta")})),a.addEventListener("click",(function(){n.classList.remove("CTA_show"),sessionStorage.setItem("clicked","contactCta"),c.classList.toggle("add_dark_contactbutton_color"),e.classList.toggle("topPadding_added"),o.classList.contains("hide_contactIcon")?(setTimeout((function(){o.classList.remove("hide_contactIcon")}),150),s.classList.remove("show_xIcon")):(setTimeout((function(){s.classList.add("show_xIcon")}),150),o.classList.add("hide_contactIcon"));for(const c of t)c.classList.toggle("show_contactItems")})),c.addEventListener("click",(function(){n.classList.remove("CTA_show"),sessionStorage.setItem("clicked","contactCta"),c.classList.toggle("add_dark_contactbutton_color"),e.classList.toggle("topPadding_added"),o.classList.contains("hide_contactIcon")?(setTimeout((function(){o.classList.remove("hide_contactIcon")}),150),s.classList.remove("show_xIcon")):(setTimeout((function(){s.classList.add("show_xIcon")}),150),o.classList.add("hide_contactIcon"));for(const c of t)c.classList.toggle("show_contactItems")})))}));
//# sourceMappingURL=contact-widget-op-public.js.map