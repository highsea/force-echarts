

// obj 转换
function obj2str(o){   

    var r = [];   

    if(typeof o =="string") return "\""+o.replace(/([\'\"\\])/g,"\\$1").replace(/(\n)/g,"\\n").replace(/(\r)/g,"\\r").replace(/(\t)/g,"\\t")+"\"";   

    if(typeof o =="undefined") return "";   

    if(typeof o == "object"){   

        if(o===null) return "null";   

        else if(!o.sort){   

            for(var i in o)   

                 r.push(i+":"+obj2str(o[i]))   

             r="{"+r.join()+"}"  

         }else{   

            for(var i =0;i<o.length;i++)   

                 r.push(obj2str(o[i]))   

             r="["+r.join()+"]"  

         }   

        return r;   

     }   

    return o.toString();   

}

  
