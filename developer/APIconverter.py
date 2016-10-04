#Convert API reference file to website

import sys
from webtemplate import *
from Node import *

f = open('loccasionAPIreference.txt','r')
lines = f.readlines()
f.close()
total_lines = len(lines)
current_path = []
current_count = -1
baseNode = Node(None,"base",-1)
#f.open('API/index.html','w')
#f.write

pages = []

current_nodes = []

# Map out the nodes so that they can be referenced later
# Basically makes my recursive creation process obselete, but whatever I liked making that for the challenge of it
for line_number in range(total_lines):
	clean_line = lines[line_number].rstrip().replace('\t','')
	line_name = clean_line[:clean_line.index('(')]
	depth = lines[line_number].count('\t')
	if depth == 0:
		current_node = Node(baseNode,line_name,depth)
		baseNode.addChild(current_node)
	else:
		current_node = Node(current_nodes[depth-1],line_name,depth)
		current_nodes[depth-1].addChild(current_node)
 
	if len(current_nodes) <= depth:
		current_nodes.append(current_node)
	else:
		current_nodes[depth] = current_node

def printNodes(base):
	print (base.depth*"\t")+base.name
	if len(base.children) > 0:
		for child in base.children:
			printNodes(child)

# A depth first recursive search through the origin file to create the webpages
def recursive_create(current_id):
	global total_lines
	global current_path
	global current_count
	if current_id < total_lines:
		clean_line = lines[current_id].rstrip().replace('\t','')
		line_name = clean_line[:clean_line.index('(')]
		depth = lines[current_id].count('\t')
		#print line_name + ' depth: ' + str(depth) + ' current_count: ' + str(current_count)
		if depth > current_count:
			current_path.append(line_name)
			current_count += 1
			returned_id,returned_depth = recursive_create(current_id+1)
			#print(('->'.join(current_path))) #create page
			create_page(current_path,clean_line,baseNode,depth)
			pages.append((current_path,clean_line))
			current_path.pop()
			current_count -= 1
			if returned_depth == depth:
				return recursive_create(returned_id)
			else:
				return (returned_id,returned_depth)
		elif depth <= current_count:
			#current_count -= 1
			return (current_id,depth)
	print "done"
	sys.exit()
	

#printNodes(baseNode)
create_index_page(baseNode)
recursive_create(0)
sys.exit()

#for page in pages:
#	create_page(page[0],page[1])