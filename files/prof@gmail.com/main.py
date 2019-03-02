from users import Users
from gui import Gui

class Boss:
    def __init__(self):
        self.users = Users()
        self.gui = Gui(self.users)
        self.gui.show_users()


def main(argv):
    b = Boss()

if __name__ == "__main__":
    import sys
    main(sys.argv)
