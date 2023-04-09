const r = [ /*...*/ ]

function search_btn(x) {
    var s = document.getElementById("txt1").value



    if (
        s == s &&
        s == r[0] ||
        s == r[1] ||
        s == r[2] ||
        s == r[3] ||
        s == r[4] // ...

    ) {

        document.getElementById('T').style.display = 'none'

        function search(text, pattern) {

            let concat = pattern + "$" + text;

            let l = concat.length;

            let Z = new Array(l);


            getZarr(concat, Z);

            for (let i = 0; i < l; ++i) {


                if (Z[i] == pattern.length) {
                    let rx = [


                    ]
                    let txt = ''
                    for (x in rx) {
                        text = txt += rx[x]
                    }
                    let start = i - pattern.length - 1
                    let pattern_ = s
                    let end = start + pattern_.length + 4
                    console.log(

                        (text.slice(start - 25, end)));




                    img.setAttribute("alt", text.slice(start - 25, end));
                    if (document.getElementsByClassName("myimg").length == 0) {
                        document.body.appendChild(img);

                    }
                }

            }

        }


        function getZarr(str, Z) {
            let n = str.length;


            let L = 0,
                R = 0;

            for (let i = 1; i < n; ++i) {

                if (i > R) {

                    L = R = i;


                    while (R < n && str[R - L] == str[R])
                        R++;

                    Z[i] = R - L;
                    R--;

                } else {

                    let k = i - L;

                    if (Z[k] < R - i + 1)
                        Z[i] = Z[k];

                    else {


                        L = i;
                        while (R < n && str[R - L] == str[R])
                            R++;

                        Z[i] = R - L;
                        R--;
                    }
                }
            }
        }


        let rx = [

            //...
        ]
        let txt = ''
        for (x in rx) {
            text = txt += rx[x]
        }

        let pattern = s

        let start = search(text, pattern);


    }
}


AutoSuggestControl.prototype.highlightSuggestion = function(oSuggestionNode) {

    for (var i = 0; i < this.layer.childNodes.length; i++) {
        var oNode = this.layer.childNodes[i];
        if (oNode == oSuggestionNode) {
            oNode.className = "current"
        } else if (oNode.className == "current") {
            oNode.className = "";
        }
    }
};


AutoSuggestControl.prototype.hideSuggestions = function() {
    this.layer.style.visibility = "hidden";
};



AutoSuggestControl.prototype.createDropDown = function() {

    this.layer = document.createElement("div");
    this.layer.setAttribute("id", "reaction")
    this.layer.className = "suggestions";
    this.layer.style.visibility = "hidden";
    this.layer.style.width = this.textbox.offsetWidth;
    this.layer.style.display = "none";
    document.body.appendChild(this.layer);

    // gestione mouse
    var oThis = this;

    this.layer.onmousedown = this.layer.onmouseup =
        this.layer.onmouseover = function(oEvent) {
            oEvent = oEvent || window.event;
            oTarget = oEvent.target || oEvent.srcElement;

            if (oEvent.type == "mousedown") {
                oThis.textbox.value = oTarget.firstChild.nodeValue;
                oThis.hideSuggestions();
            } else if (oEvent.type == "mouseover") {
                oThis.highlightSuggestion(oTarget);
            } else { // mouseup
                oThis.textbox.focus();
            }
        };
};

AutoSuggestControl.prototype.getLeft = function() {

    var oNode = this.textbox;
    var iLeft = 0;

    while (oNode.tagName != "BODY") {
        iLeft += oNode.offsetLeft;
        oNode = oNode.offsetParent;
    }

    return iLeft;
};

AutoSuggestControl.prototype.getTop = function() {

    var oNode = this.textbox;
    var iTop = 0;

    while (oNode.tagName != "BODY") {
        iTop += oNode.offsetTop;
        oNode = oNode.offsetParent;
    }

    return iTop;
};

AutoSuggestControl.prototype.showSuggestions = function(aSuggestions) {
    var oDiv = null;
    this.layer.innerHTML = "";

    for (var i = 0; i < aSuggestions.length; i++) {

        oDiv = document.createElement("div");
        oDiv.setAttribute("id", "reaction")
        oDiv.appendChild(document.createTextNode(aSuggestions[i]));
        this.layer.appendChild(oDiv);
    }

    this.layer.style.left = this.getLeft() + "px";
    this.layer.style.top = (this.getTop() + this.textbox.offsetHeight) + "px";
    this.layer.style.visibility = "visible";
    this.layer.style.display = "block";
    this.layer.style.background = "rgb(239, 47, 60)"
    document.getElementById("txt1").addEventListener("click", removeDiv);

    function removeDiv() {
        document.getElementsByTagName("div")[0].style.display = "none"
    }

};

AutoSuggestControl.prototype.nextSuggestion = function() {
    var cSuggestionNodes = this.layer.childNodes;

    if (cSuggestionNodes.length > 0 && this.cur < cSuggestionNodes.length - 1) {
        var oNode = cSuggestionNodes[++this.cur];
        this.highlightSuggestion(oNode);
        this.textbox.value = oNode.firstChild.nodeValue;

    }
};

AutoSuggestControl.prototype.previousSuggestion = function() {
    var cSuggestionNodes = this.layer.childNodes;

    if (cSuggestionNodes.length > 0 && this.cur > 0) {
        var oNode = cSuggestionNodes[--this.cur];
        this.highlightSuggestion(oNode);
        this.textbox.value = oNode.firstChild.nodeValue;

    }
};

AutoSuggestControl.prototype.handleKeyDown = function(oEvent) {
    switch (oEvent.keyCode) {
        case 38: //up arrow
            this.previousSuggestion();
            break;
        case 40: //down arrow
            this.nextSuggestion();
            break;
        case 13: //enter
            this.hideSuggestions();
            break;
    }
};


function AutoSuggestControl(oTextbox, oProvider) {
    this.cur = -1;
    this.layer = null;
    this.provider = oProvider;
    this.textbox = oTextbox;
    this.init();
}


AutoSuggestControl.prototype.selectRange = function(iStart, iLength) {
    if (this.textbox.createTextRange) {
        var oRange = this.textbox.createTextRange();
        oRange.moveStart("character", iStart);
        oRange.moveEnd("character", iLength - this.textbox.value.length);
        oRange.select();
    } else if (this.textbox.setSelectionRange) {
        this.textbox.setSelectionRange(iStart, iLength);
    }

    this.textbox.focus();
};


AutoSuggestControl.prototype.typeAhead = function(sSuggestion) {
    if (this.textbox.createTextRange || this.textbox.setSelectionRange) {
        var iLen = this.textbox.value.length;
        this.textbox.value = sSuggestion;
        this.selectRange(iLen, sSuggestion.length);
    }
};

AutoSuggestControl.prototype.autosuggest = function(aSuggestions, bTypeAhead) {

    if (aSuggestions.length > 0) {
        if (bTypeAhead) {

            this.typeAhead(aSuggestions[0]);
        }
        this.showSuggestions(aSuggestions);
    } else {
        this.hideSuggestions();
    }
};

AutoSuggestControl.prototype.handleKeyUp = function(oEvent) {
    var iKeyCode = oEvent.keyCode;

    if (iKeyCode == 8 || iKeyCode == 46) {
        this.provider.requestSuggestions(this, false);

    } else if (iKeyCode < 32 || (iKeyCode >= 33 && iKeyCode <= 46) || (iKeyCode >= 112 && iKeyCode <= 123)) {

    } else {

        this.provider.requestSuggestions(this, true);
    }
};


AutoSuggestControl.prototype.init = function() {
    var oThis = this;
    this.textbox.onkeyup = function(oEvent) {
        if (!oEvent) {
            oEvent = window.event;
        }

        oThis.handleKeyUp(oEvent);
    };



    this.textbox.onkeydown = function(oEvent) {

        if (!oEvent) {
            oEvent = window.event;
        }

        oThis.handleKeyDown(oEvent);
    };


    this.textbox.onblur = function() {
        oThis.hideSuggestions();
    };

    this.createDropDown();
};


function StateSuggestions() {


    this.states = [
        //...
    ];


}

StateSuggestions.prototype.requestSuggestions = function(oAutoSuggestControl, bTypeAhead) {
    var aSuggestions = [];
    var sTextboxValue = oAutoSuggestControl.textbox.value;

    if (sTextboxValue.length > 0) {

        var sTextboxValueLC = sTextboxValue.toLowerCase();

        for (var i = 0; i < this.states.length; i++) {

            const capitalize = (str) => {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }

            var sStateLC = this.states[i].toLowerCase();

            if (sStateLC.indexOf(sTextboxValueLC) == 0) {

                aSuggestions.push(capitalize(sTextboxValue) + this.states[i].substring(sTextboxValue.length));
            }
        }
    }

    oAutoSuggestControl.autosuggest(aSuggestions, bTypeAhead);
};


window.onload = function() {
    var oTextbox = new AutoSuggestControl(document.getElementById("txt1"), new StateSuggestions());

}