
class Node:

	def __init__(self,newParent,newName="",depth=0):
		self.parent = newParent
		self.name = newName
		self.depth = depth
		self.children = []

	def addChild(self, child):
		self.children.append(child)