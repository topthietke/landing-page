import 'package:flutter/material.dart';
import 'package:hello_world/layouts/projects/projects.dart';
// ─── PROJECTS TAB ─────────────────────────────────────────────────────────────

class ProjectsTab extends StatelessWidget {
  const ProjectsTab({super.key});

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: ListView.separated(
        padding: const EdgeInsets.symmetric(vertical: 16),
        itemCount: projects.length,
        separatorBuilder: (_, __) => Divider(
          color: Colors.white.withOpacity(0.07),
          indent: 80,
          height: 1,
        ),
        itemBuilder: (context, i) => _ProjectTile(project: projects[i]),
      ),
    );
  }
}

class _ProjectTile extends StatelessWidget {
  final Project project;

  const _ProjectTile({required this.project});

  static const _projectIcons = [
    Icons.work_outline,
    Icons.message_outlined,
    Icons.directions_car_outlined,
    Icons.local_taxi_outlined,
  ];

  static const _projectLogos = ['T', 'M', 'S', 'S'];

  @override
  Widget build(BuildContext context) {
    final index = projects.indexOf(project);

    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
      child: Row(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          // Icon
          Container(
            width: 52,
            height: 52,
            decoration: BoxDecoration(
              color: project.iconBgColor.withOpacity(0.15),
              borderRadius: BorderRadius.circular(12),
              border: Border.all(
                color: project.iconBgColor.withOpacity(0.3),
                width: 1,
              ),
            ),
            child: Center(
              child: Text(
                _projectLogos[index % _projectLogos.length],
                style: TextStyle(
                  fontSize: 20,
                  fontWeight: FontWeight.w700,
                  color: project.iconBgColor,
                ),
              ),
            ),
          ),
          const SizedBox(width: 14),

          // Text
          Expanded(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  project.name,
                  style: const TextStyle(
                    fontSize: 15,
                    fontWeight: FontWeight.w600,
                    color: Colors.white,
                  ),
                ),
                const SizedBox(height: 5),
                Text(
                  project.description,
                  style: TextStyle(
                    fontSize: 12.5,
                    color: Colors.white.withOpacity(0.55),
                    height: 1.5,
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
