if(!self.define){const e=async e=>{if("require"!==e&&(e+=".js"),!o[e]&&(await new Promise(async r=>{if("document"in self){const o=document.createElement("script");o.src=e,document.head.appendChild(o),o.onload=r}else importScripts(e),r()}),!o[e]))throw new Error(`Module ${e} didn’t register its module`);return o[e]},r=async(r,o)=>{const i=await Promise.all(r.map(e));o(1===i.length?i[0]:i)};r.toUrl=e=>`./${e}`;const o={require:Promise.resolve(r)};self.define=(r,i,s)=>{o[r]||(o[r]=new Promise(async o=>{let c={};const f={uri:location.origin+r.slice(1)},n=await Promise.all(i.map(r=>"exports"===r?c:"module"===r?f:e(r))),t=s(...n);c.default||(c.default=t),o(c)}))}}define("./service-worker.js",["./workbox-4bf77616"],(function(e){"use strict";e.skipWaiting(),e.clientsClaim(),e.precacheAndRoute([{url:"build/main.css",revision:"a6cf019037cf39cc8aea509d21df2e51"},{url:"build/main.js",revision:"b77741a860dd4438c4ad4c15207317e7"},{url:"build/scrollreveal.js",revision:"542204709d4d6162f115b76e86e9b0b4"},{url:"fonts/SourceSerifPro/family.css",revision:"d1fcd45269400df65b645c2cd8e99844"},{url:"fonts/SourceSerifPro/SourceSerifPro-Bold.ttf.woff2",revision:"be93b6dc83bb64cc0107c90b6b7b953f"},{url:"fonts/SourceSerifPro/SourceSerifPro-BoldIt.ttf.woff2",revision:"0347030446e9545f1511449423dd03b6"},{url:"fonts/SourceSerifPro/SourceSerifPro-It.ttf.woff2",revision:"22499dd65afb627820dc322050ad96c5"},{url:"fonts/SourceSerifPro/SourceSerifPro-Regular.ttf.woff2",revision:"f57d4f93ac6d0aff061caa1d7e75e1a1"}],{}),e.registerRoute(/\.(?:png|jpg|svg|webp)$/,new e.CacheFirst({cacheName:"images-cache",plugins:[new e.ExpirationPlugin({maxEntries:50,maxAgeSeconds:2592e3,purgeOnQuotaError:!0})]}),"GET")}));
//# sourceMappingURL=service-worker.js.map
