<style>
.button {
  border-radius: 15px;
  background-color: #12C6FC;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 15px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:before {
  content: '\00ab';
  position: absolute;
  opacity: 0;
  top: 0;
  left: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-left: 25px;
}

.button:hover span:before {
  opacity: 1;
  left: 0;
}
</style>
<a href="cat_page.php"><div align="center"><button class="button" style="vertical-align:middle"><span>Category Manager</span></button></div></a>
