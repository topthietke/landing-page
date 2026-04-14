import 'package:flutter/material.dart';
import 'package:hello_world/layouts/abouts/about.dart';
import 'package:hello_world/layouts/blogs/blog.dart';
import 'package:hello_world/layouts/projects/project_tab.dart';
import 'package:hello_world/layouts/projects/projects.dart';

// ─── MAIN SCREEN ─────────────────────────────────────────────────────────────
class MainScreen extends StatefulWidget {
  const MainScreen({super.key});

  @override
  State<MainScreen> createState() => _MainScreenState();
}

class _MainScreenState extends State<MainScreen> {
  int _currentIndex = 0;

  final List<Widget> _pages = const [AboutTab(), BlogTab(), ProjectsTab()];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFF1A1A1A),
      body: _pages[_currentIndex],
      bottomNavigationBar: _BottomNav(
        currentIndex: _currentIndex,
        onTap: (i) => setState(() => _currentIndex = i),
      ),
    );
  }
}

class _BottomNav extends StatelessWidget {
  final int currentIndex;
  final ValueChanged<int> onTap;

  const _BottomNav({required this.currentIndex, required this.onTap});

  @override
  Widget build(BuildContext context) {
    const items = [
      {
        'icon': Icons.person_outline,
        'activeIcon': Icons.person,
        'label': 'About',
      },
      {
        'icon': Icons.article_outlined,
        'activeIcon': Icons.article,
        'label': 'Blog',
      },
      {
        'icon': Icons.folder_outlined,
        'activeIcon': Icons.folder,
        'label': 'Projects',
      },
    ];
    return Container(
      decoration: BoxDecoration(
        color: const Color(0xFF222222),
        border: Border(
          top: BorderSide(color: Colors.white.withOpacity(0.08), width: 1),
        ),
      ),
      child: SafeArea(
        child: SizedBox(
          height: 60,
          child: Row(
            mainAxisAlignment: MainAxisAlignment.spaceAround,
            children: List.generate(items.length, (i) {
              final isActive = i == currentIndex;
              return GestureDetector(
                onTap: () => onTap(i),
                behavior: HitTestBehavior.opaque,
                child: SizedBox(
                  width: 80,
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Icon(
                        isActive
                            ? items[i]['activeIcon'] as IconData
                            : items[i]['icon'] as IconData,
                        color: isActive
                            ? const Color(0xFF4FC3F7)
                            : Colors.white38,
                        size: 22,
                      ),
                      const SizedBox(height: 3),
                      Text(
                        items[i]['label'] as String,
                        style: TextStyle(
                          fontSize: 11,
                          color: isActive
                              ? const Color(0xFF4FC3F7)
                              : Colors.white38,
                          fontWeight: isActive
                              ? FontWeight.w600
                              : FontWeight.normal,
                        ),
                      ),
                    ],
                  ),
                ),
              );
            }),
          ),
        ),
      ),
    );
  }
}
