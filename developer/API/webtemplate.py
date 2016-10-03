import os


def create_page(path,line,baseNode,depth):
	line_name = line[:line.index('(')]
	descriptors = line[line.index('(')+1:-1].replace('\,','`').split(',')
		
	read = descriptors[0].replace('`',',')
	write = descriptors[1].replace('`',',')
	requirements = descriptors[2].replace('`',',')
	description = descriptors[3].replace('`',',')
	current_node = baseNode

	while current_node.depth != len(path)-1:
		children = []
		for child in current_node.children:
			children.append(child.name)
		current_node = current_node.children[children.index(path[current_node.depth+1])]

	children = []
	for child in current_node.children:
		children.append(child.name)

	siblings = []
	for child in current_node.parent.children:
		siblings.append(child.name)

	children_links = []
	for child in children:
		children_links.append('<a href="./'+line_name.replace('$','')+'/'+child.replace('$','')+'.html"><li>'+child+"</li></a>")

	siblings_links = []
	for sibling in siblings:
		siblings_links.append('<a href="'+sibling+'.html"><li>'+sibling+"</li></a>")

	siblings_before = siblings_links[:siblings.index(line_name)]
	siblings_after = siblings_links[siblings.index(line_name)+1:]

	if len(siblings_before) > 0:
		siblings_before_str = ""+''.join(siblings_before)+""
	else:
		siblings_before_str = ""

	if len(siblings_after) > 0:
		siblings_after_str = ""+''.join(siblings_after)+""
	else:
		siblings_after_str = ""

	# -- make directories --
	for i in range(len(path)):
		if not os.path.isdir('API/'+'/'.join(path[:i]).replace('$','')):
			os.makedirs('API/'+'/'.join(path[:i]).replace('$',''))

	# -- prep work --
	curpath = ""
	path_files = []
	print path
	for path_item in path: #full directory path to each item on the path
		path_files.append(curpath+"/"+path_item.replace('$','')+".html")
		curpath = curpath+"/"+path_item.replace('$','')
		print curpath
	path_files_html = [] 
	for i in range(len(path_files)): #link to each item in the path
		path_files_html.append('<a href="/API'+path_files[i]+'" class="path-link">'+path[i]+'</a>')
	full_html_path = '->'.join(path_files_html) #single line of all items on the path 


	f = open('API/'+'/'.join(path[:len(path)]).replace('$','')+'.html','w')
	f.write('''

<html>
<head>
<link rel="stylesheet" type="text/css" href="/API_style.css">
</head>

<div id="top-bar">
<h1><a href="/developer/API/index.html">Loccasion API</a></h1>
<div id="navigation-bar">
<div id="full-path">'''+full_html_path+'''</div></br>
</div>
</div>
<div id="content-wrapper">
<div id="sidebar">
<ul>
'''+siblings_before_str+'''
<li><b>'''+line_name+'''</b></li>
<li style="list-style-type:none; opacity: 1 !important;">
  <ul>
  '''+''.join(children_links)+'''
  </ul>
</li>
'''+siblings_after_str+'''
</ul>
</div>
<div id="main-content">
<h2>'''+line_name+'''</h2></br>
<div id="description"><span id="description-text">'''+description+'''</span></div>
<div id="descriptors">
<div id="read">Read: <span id="read-text">'''+read+'''</span> can read this location</div>
<div id="write">Write: <span id="write-text">'''+write+'''</span> can write to this location</div>
<div id="requirements">This field requires that <span id="requirements-text">'''+requirements+'''</span></div>
</div>
<div id="example">
<textarea style="width:100%">https://meet-up-8d278.firebaseio.com'''+curpath+'''.json?print=pretty</textarea>
</div>
</div>
</div>


</html>
		''')

def create_index_page(baseNode):

	current_node = baseNode

	children = []
	for child in current_node.children:
		children.append(child.name)

	children_links = []
	for child in children:
		children_links.append('<a href="API/'+child.replace('$','')+'.html"><li>'+child+"</li></a>")

	f = open('index.html','w')
	f.write('''

<html>
<head>
<link rel="stylesheet" type="text/css" href="/API_style.css">
</head>

<div id="top-bar">
<h1><a href="/developer/API/index.html">Loccasion API</a></h1>
</div>
<div id="content-wrapper">
<div id="sidebar">
<ul>
'''+''.join(children_links)+'''
</ul>
</div>
<div id="main-content">
<h2>Welcome</h2></br>
<div id="description"><span id="description-text">Loccasion API</span></div>
<div id="descriptors">
<div id="read">Here are all the parts of the database that can be accessed, each with the requirements for reading and writing and requirements for what has to be in the field.</div>
<div id="write">Ones with dollar signs ($) preceding the name are variables, so when you call the server replace it with a value. The others are constants and must be called by the name that appears.</div>
<div id="requirements">At the bottom of each page is an example call to the database for you to copy</div>
</div>

</div>
</div>


</html>
		''')
