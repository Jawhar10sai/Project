
<style media="screen">
.switchBtn {
    position: relative;
    display: inline-block;
    width: 110px;
    height: 34px;
}
.switchBtn input {display:none;}
.slide {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    padding: 8px;
    color: #fff;
}
.slide:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 78px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}
input:checked + .slide {
    background-color: #8CE196;
    padding-left: 40px;
}
input:focus + .slide {
    box-shadow: 0 0 1px #01aeed;
}
input:checked + .slide:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    left: -20px;
}

.slide.round {
    border-radius: 34px;
}
.slide.round:before {
    border-radius: 50%;
}
</style>
<label class="switchBtn">
    <input type="checkbox">
    <div class="slide">Filter On</div>
</label>
Rounded Style Toggle Switch

<label class="switchBtn">
    <input type="checkbox">
    <div class="slide round">Filter On</div>
</label>
