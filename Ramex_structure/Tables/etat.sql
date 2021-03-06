USE [RAMEX]
GO

/****** Object:  Table [dbo].[Etat]    Script Date: 28/12/2020 09:34:08 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Etat](
	[etat_num] [int] NOT NULL,
	[etat_lib] [varchar](50) NULL,
 CONSTRAINT [PK_Etat] PRIMARY KEY CLUSTERED
(
	[etat_num] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
